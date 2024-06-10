<?php

namespace App\Http\Controllers;

use App\Http\Resources\SongResource;
use App\Models\Song;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RecommendedController extends Controller
{
    // GENERAL TF_ITF SCRIPT
    public function recommendedSongs(): JsonResponse
    {
        $user = Auth::user();
        $likedSongs = $user->favourites->pluck('id')->toArray();
        // Получение всех треков, относящихся к понравившимся трекам пользователя
        $songs = Song::query()->whereIn('id', $likedSongs)->get();
        // Построение матрицы TF-IDF
        $tfidfMatrix = $this->buildTfidfMatrix($songs);
        // Расчет схожести песен
        $similarityMatrix = $this->calculateSimilarityMatrix($tfidfMatrix);
        // Получение индексов наиболее похожих песен
        $similarSongIndices = $this->getSimilarSongIndices($similarityMatrix);
        // Получение информации о рекомендуемых песнях
        $recommendedSongs = Song::query()->whereIn('id', $similarSongIndices)->get();

        return response()->json([
            'recommended_songs' => SongResource::collection($recommendedSongs)
        ]);
    }

    private function buildTfidfMatrix($songs): array
    {
        $songCount = count($songs);
        $featureCount = Song::query()->count();
        $tfidfMatrix = [];
        foreach ($songs as $song) {
            $tfidfVector = array_fill(0, $featureCount, 0);
            foreach ($song->genres as $feature) {
                $tfidfVector[$feature->id] = $this->calculateTfidf($song, $feature);
            }
            $tfidfMatrix[] = $tfidfVector;
        }

        return $tfidfMatrix;
    }

    private function calculateTfidf($song, $feature): float|int
    {
        $termFrequency = $song->getTermFrequency($feature);
        $inverseDocumentFrequency = $this->calculateInverseDocumentFrequency($feature);
        return $termFrequency * $inverseDocumentFrequency;
    }

    private function calculateInverseDocumentFrequency($feature): float|int
    {
        $documentCount = Song::query()->count();
        $documentFrequency = $feature->songs()->count();
        if ($documentFrequency == 0) {
            return 0;
        }
        return log($documentCount / ($documentFrequency + 1));
    }

    private function calculateSimilarityMatrix($tfidfMatrix): array
    {
        $songCount = count($tfidfMatrix);
        $similarityMatrix = [];
        for ($i = 0; $i < $songCount; $i++) {
            $similarities = [];
            for ($j = 0; $j < $songCount; $j++) {
                $similarity = $this->cosineSimilarity($tfidfMatrix[$i], $tfidfMatrix[$j]);
                $similarities[$j] = $similarity;
            }
            $similarityMatrix[] = $similarities;
        }

        return $similarityMatrix;
    }

    private function getSimilarSongIndices($similarityMatrix): array
    {
        $songIndex = 0;
        $similarSongIndices = $similarityMatrix[$songIndex];
        arsort($similarSongIndices);
        return array_keys($similarSongIndices);
    }

    private function cosineSimilarity($vector1, $vector2): float|int
    {
        $dotProduct = 0;
        $magnitude1 = 0;
        $magnitude2 = 0;
        for ($i = 0; $i < count($vector1); $i++) {
            $dotProduct += $vector1[$i] * $vector2[$i];
            $magnitude1 += pow($vector1[$i], 2);
            $magnitude2 += pow($vector2[$i], 2);
        }
        $magnitude1 = sqrt($magnitude1);
        $magnitude2 = sqrt($magnitude2);
        if ($magnitude1 == 0 || $magnitude2 == 0) {
            return 0;
        }

        return $dotProduct / ($magnitude1 * $magnitude2);
    }
}
