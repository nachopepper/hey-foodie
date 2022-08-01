<?php

namespace App\Http\Requests\sell;

use Illuminate\Foundation\Http\FormRequest;

class StoreSell extends FormRequest
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
            'potionId' => 'required|integer',
            'witchId' => 'required|integer',
            'quantity' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'potionId.required' => 'El id de la poción es requerido',
            'potionId.integer' => 'El id de la poción debe ser de tipo entero',

            'witchId.required' => 'El id de la bruja es requerido',
            'witchId.integer' => 'El id de la bruja debe ser de tipo entero',

            'quantity.required' => 'La cantidad es requerida',
            'quantity.numeric' => 'La cantidad debe ser de tipo numérica'
        ];
    }
}
