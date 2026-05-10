<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "user_id" => "required|string",
            "event_id" => "nullable|string",
            "category_id" => "nullable|string",
            "start_date" => "required|date",
            "expire_date" => "required|date|after:start_date",
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'expire_date.required' => 'The expire date is required.',
            'expire_date.date' => 'The expire date must be a valid date.',
            'expire_date.after' => 'The expire date must be after the start date.',
        ];
    }
}
