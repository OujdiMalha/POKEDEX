<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'pv' => 'required|integer',
            'poids' => 'required|numeric',
            'taille' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ];
    }
}


