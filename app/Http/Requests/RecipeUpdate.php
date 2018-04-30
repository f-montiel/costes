<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeUpdate extends FormRequest
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
            'name' => 'required',
            'quantity' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe Ingresar un Nombre',
            'quantity.required' => 'Debe ingresar una Cantidad'
        ];
    }
}
