<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleStore extends FormRequest
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
            'client_id' => 'required',
        ];
    }

    public function messages()
    {
    return [
        'date.required' => 'Tiene que Ingresar una Fecha',
        'client_id.required'  => 'Tiene que Seleccionar un Cliente',
    ];
    } 
}
