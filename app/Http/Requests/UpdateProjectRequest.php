<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:150|unique:projects',
            'content' => 'nullable|max:300',
            'date' => 'nullable|date',
            'cover_img' => 'min:10|max:255|url',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id'

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è un campo necessario',
            'title.max' => 'Il campo titolo può contenere al massimo 150 caratteri',
            'content.max' => 'La descrizione può contenere al massimo 300 caratteri',
            'date.date' => 'Inserire una data valida',
            'cover_img.min' => 'Il capo Url dovrà essere di almeno 10 caratteri',
            'cover_img.max' => 'Il capo Url dovrà essere di massimo 255 caratteri',
            'cover_img.url' => 'Inserire un URL valido'
        ];
    }
}
