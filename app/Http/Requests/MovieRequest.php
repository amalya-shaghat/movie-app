<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'poster_url' => 'nullable|image',
            'is_published' => 'string',
            'genres' => 'array'
        ];
    }
}
