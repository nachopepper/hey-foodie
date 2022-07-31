<?php

namespace App\Http\Requests\ingredient;

use Illuminate\Foundation\Http\FormRequest;

class StoreIngredient extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del ingrediente es requerido',
            'name.string' => 'El nombre del ingrediente debe ser de tipo string',

            'price.required' => 'El precio del ingrediente es requerido',
            'price.integer' => 'El precio del debe ser de tipo entero',
        ];
    }
}
