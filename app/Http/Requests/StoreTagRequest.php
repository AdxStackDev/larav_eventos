<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|string|max:255|unique:tags,name," . $this->route('tag'),
            "description" => "nullable|string",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The tag name is required.',
            'name.unique' => 'This tag name already exists.',
            'name.max' => 'The tag name cannot exceed 255 characters.',
        ];
    }
}
