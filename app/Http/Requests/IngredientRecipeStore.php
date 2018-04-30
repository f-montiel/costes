<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientRecipeStore extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'ingredient' => 'required',
            'quantity' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ingredient.required' => 'Tiene que Seleccionar un Ingrediente',
            'quantity.required'  => 'Tiene que Ingresar una Cantidad'
    ];
    }
}
