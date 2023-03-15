<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlantesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'scientific_name' => 'required|string',
            'family' => 'required|string',
            'genus' => 'required|string',
            'height' => 'required',
            'origin' => 'required|string',
            'quantity' => 'required',
            'category_id' => 'required',
        ];
    }
}
