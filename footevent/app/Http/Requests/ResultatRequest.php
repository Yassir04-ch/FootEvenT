<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultatRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'scoreEq1' => 'required|integer',
        'scoreEq2' => 'required|integer',
        'penaltyE1'=> 'nullable|integer',
        'penaltyE2'=> 'nullable|integer'
        ];
    }
}
