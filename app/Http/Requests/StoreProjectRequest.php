<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|string|unique:projects|min:10|max:40',
            'description' => 'required|string',
            'image' => 'nullable|url',
            'is_completed' => 'nullable|boolean'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'E\' necessario inserire un titolo',
            'title.unique' => 'E\' già presente un progetto con lo stesso titolo',
            'title.min' => 'Il titolo deve essere almeno di :min caratteri',
            'title.max' => 'Il titolo non può superare i :max caratteri',
            'description.required' => 'E\' necessario inserire una descrizione',
            'image.url' => 'Il formato dell\'immagine non è corretto',
            'is_completed.boolean' => 'Lo stato deve essere un dato booleano'
        ];
    }
}
