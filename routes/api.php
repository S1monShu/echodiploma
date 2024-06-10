<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RecommendedController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;
/*
*  GROUP_UNGUARDED
 * PUBLIC_ROUTES
 */

Route::post('/signIn', [AuthController::class, 'signIn'])->name('signIn');
Route::post('/signUp', [AuthController::class, 'signUp'])->name('signUp');
Route::get('/unauthorized', [AuthController::class, 'unauthorized'])->name('unauthorized');
// ARTISTS
Route::get('/artists', [ArtistController::class, 'index'])->name('artists');
Route::get('/artists/{id}', [ArtistController::class, 'show'])->name('artist_show');
// SONGS
Route::get('/songs', [SongController::class, 'index'])->name('songs');
// GENRES
Route::get('/genres', [GenreController::class, 'index'])->name('genres');
Route::get('/genres/{id}', [GenreController::class, 'show'])->name('genre_show');
// PLAYLISTS
Route::get('/playlist/{id}', [PlaylistController::class, 'show'])->name('playlist_show');
Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists');
/*
*  GROUP_AUTH
 * USER_ROUTES
 */
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logOut', [AuthController::class, 'logOut'])->name('logOut');
    Route::post('/artist/application', [ArtistController::class, 'setApplication'])->name('set_application');
    Route::post('/user/edit', [ArtistController::class, 'edit'])->name('edit_user');
    Route::get('/user/show', [ArtistController::class, 'showUser'])->name('show_user');
    Route::post('/songs/{id}/favourite', [SongController::class, 'setFavourite'])->name('set_favourite');
    Route::get('/songs/recommended', [RecommendedController::class, 'recommendedSongs'])->name('songs_recommended');
});
/*
*  GROUP_ARTIST
 * AUTH_WITH_ARTIST_ROUTES
 */
Route::group(['middleware' => ['auth:sanctum', 'artist']], function () {
    Route::post('/songs/new', [SongController::class, 'store'])->name('song_new');
    Route::get('/applications/reject', [SongController::class, 'indexApplications'])->name('artist_reject');
    Route::post('/playlist/new', [PlaylistController::class, 'store'])->name('playlist_store');
    Route::delete('/playlist/{id}', [PlaylistController::class, 'delete'])->name('playlist_delete');
    Route::post('/playlist/{id}/edit', [PlaylistController::class, 'edit'])->name('playlist_edit');
    Route::post('/playlist/{id_playlist}/{id_song}', [PlaylistController::class, 'addSongToPlaylist'])->name('playlist_add_song');
    Route::delete('/playlist/{id_playlist}/{id_song}', [PlaylistController::class, 'deleteSongFromPlaylist'])->name('playlist_delete_song');
});
/*
*  GROUP_ADMIN
 * AUTH_WITH_ADMIN_ROUTES
 */
Route::group(['middleware' => ['auth:sanctum', 'admin']], function () {
    Route::post('/artists/{id}', [ArtistController::class, 'store'])->name('artist_add');
    Route::delete('/artists/{id}', [ArtistController::class, 'destroy'])->name('artist_destroy');
    Route::post('/songs/{id}', [SongController::class, 'confirmSong'])->name('artist_add');
    Route::delete('/songs/{id}', [SongController::class, 'rejectSong'])->name('artist_destroy');
    Route::get('/applications/songs', [SongController::class, 'indexApplications'])->name('songs_applications');
    Route::get('/applications/artists', [ArtistController::class, 'indexApplications'])->name('artist_applications');
});
