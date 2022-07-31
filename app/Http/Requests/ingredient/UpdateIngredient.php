<?php

namespace App\Http\Requests\ingredient;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIngredient extends FormRequest
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
            'name' => 'string|required_without:price',
            'price' => 'integer|required_without:name'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'El nombre del ingrediente debe ser de tipo string',
            'name.required_without' => 'El nombre es requerido cuando no viene el precio',

            'price.integer' => 'El precio del ingrediente debe ser de tipo entero',
            'price.required_without' => 'El precio es requerido cuando no viene el nombre',
        ];
    }
}
