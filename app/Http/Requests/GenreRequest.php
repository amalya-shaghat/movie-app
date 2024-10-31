<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:genres,name,' . $this->route('genre')?->id ?? $this->route('genre'),
        ];
    }
}
