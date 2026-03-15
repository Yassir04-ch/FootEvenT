<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTournoiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_tournoi' => "required|string|max:100",
            'date_debut' => "required|date",
            'date_fin' => "required|date",
            'statut' => "nullable|in:en_attente,en_cours,termine",
            'lieu' => "nullable|string|max:200",
            'nbEquipes' => "required|integer|min:2",
        ];
    }
}
