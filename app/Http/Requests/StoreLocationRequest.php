<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "address" => "required|string|max:255",
            "city" => "required|string|max:100",
            "state" => "nullable|string|max:100",
            "country" => "required|string|max:100",
            "zip" => "nullable|string|max:20",
            "latitude" => "nullable|numeric|between:-90,90",
            "longitude" => "nullable|numeric|between:-180,180",
            "timezone" => "nullable|string|max:50",
            "event_id" => "nullable|string",
        ];
    }

    public function messages(): array
    {
        return [
            'address.required' => 'The address is required.',
            'city.required' => 'The city is required.',
            'country.required' => 'The country is required.',
            'latitude.between' => 'The latitude must be between -90 and 90.',
            'longitude.between' => 'The longitude must be between -180 and 180.',
        ];
    }
}
