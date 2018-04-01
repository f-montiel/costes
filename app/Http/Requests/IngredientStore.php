<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientStore extends FormRequest
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
            'price' => 'required',
            'measurement_id' => 'required'
        ];
    }

    public function messages()
    {
    return [
        'name.required' => 'Tiene que Ingresar un Nombre',
        'price.required'  => 'Tiene que Ingresar un Precio',
        'measurement_id.required'  => 'Tiene que Seleccionar una Unidad de Medida'
    ];
    }
}
