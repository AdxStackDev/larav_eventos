<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            "title" => "required|string|max:255",
            "description" => "required|string",
            "image" => "sometimes|url",
            "start_time" => "sometimes|date",
            "end_time" => "sometimes|date|after:start_time",
            "user_id" => "sometimes|integer",
            "category_id" => "sometimes|integer",
            "location_id" => "sometimes|integer",
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The event title is required.',
            'title.string' => 'The event title must be a valid text.',
            'title.max' => 'The event title cannot exceed 255 characters.',
            'description.required' => 'The event description is required.',
            'description.string' => 'The event description must be a valid text.',
            'image.url' => 'The image must be a valid URL.',
            'start_time.date' => 'The start time must be a valid date.',
            'end_time.date' => 'The end time must be a valid date.',
            'end_time.after' => 'The end time must be after the start time.',
            'user_id.integer' => 'The user ID must be a valid number.',
            'category_id.integer' => 'The category ID must be a valid number.',
            'location_id.integer' => 'The location ID must be a valid number.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException(
            $validator,
            response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
