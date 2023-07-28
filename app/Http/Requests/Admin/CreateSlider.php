<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateSlider extends FormRequest
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
    public function rules():array
    {
        return [
            'image' => 'required|image|mimes:png,jpg,jpeg,wepb',
            'title_ru' => 'required|string|max:255',
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ru' => 'required|string|max:255',
            'description_uz' => 'required|string|max:255',
            'description_en' => 'required|string|max:255',
            'link' => 'nullable|string|max:55',
        ];
    }
}
