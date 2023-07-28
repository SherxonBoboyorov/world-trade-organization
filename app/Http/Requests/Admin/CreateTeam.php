<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeam extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:png,jpg,jpeg,wepb',
            'title_ru' => 'required|string|max:255',
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_ru' => 'required',
            'content_en' => 'required',
            'content_uz' => 'required',
            'biography_ru' => 'required',
            'biography_en' => 'required',
            'biography_uz' => 'required',
            'publication_ru' => 'required',
            'publication_en' => 'required',
            'publication_uz' => 'required',
        ];
    }
}
