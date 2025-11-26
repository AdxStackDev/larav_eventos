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
            "title" => "required",
            "description" => "required",
            "image" => "sometimes",
            "start_time" => "sometimes|date",
            "end_time" => "sometimes|date",
            "user_id" => "sometimes",
            "category_id" => "sometimes",
            "location_id" => "sometimes",
        ];
    }
}
