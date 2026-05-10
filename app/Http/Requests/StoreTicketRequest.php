<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            "price" => "required|numeric|min:0",
            "quantity" => "required|integer|min:1",
            "event_id" => "required|string",
            "category_id" => "nullable|string",
            "location_id" => "nullable|string",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The ticket name is required.',
            'price.required' => 'The ticket price is required.',
            'price.numeric' => 'The ticket price must be a number.',
            'price.min' => 'The ticket price must be at least 0.',
            'quantity.required' => 'The ticket quantity is required.',
            'quantity.integer' => 'The ticket quantity must be an integer.',
            'quantity.min' => 'The ticket quantity must be at least 1.',
            'event_id.required' => 'The event ID is required.',
        ];
    }
}
