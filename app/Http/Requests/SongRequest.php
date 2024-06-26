<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|required|max:255',
            'song' => 'file|max:12000|required|mimes:m4a,mp4a,mpga,mp2,mp2a,mp3,m2a,m3a,oga,ogg,spx,opus',
            'image' => 'required|file|mimes:jpg,bmp,png,svg',
            'genre_id' => 'required'
        ];
    }
}
