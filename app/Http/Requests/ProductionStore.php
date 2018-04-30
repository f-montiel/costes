<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductionStore extends FormRequest
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
            'date' => 'required',
            'name' => 'required',
            'recipe' => 'required',
            'quantity' => 'required',
            'expiration' => 'required'
        ];
    }

     public function messages()
    {
        return [
            'date.required' => 'Debe ingresar una Fecha',
            'name.required' => 'Debe ingresar un Nombre',
            'recipe.required' => 'Debe seleccionar una Receta',
            'quantity.required' => 'Debe ingresar una Cantidad',
            'expiration.required' => 'Debe Ingresar una Fecha de Vencimiento'
        ];
    }
}
