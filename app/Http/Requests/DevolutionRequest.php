<?php

namespace Uatfinfra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevolutionRequest extends FormRequest
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
        $rules = [
            'fecha'     => 'required|date',
            'cantidad'    => 'required|regex:/^[a-z A-Z ñáéíóú 0-9 ,-.()]+$/i|min:1|max:50',
            'nombre'       => 'required|regex:/^[a-z ñáéíóú 0-9 ,-.()]+$/i|min:2|max:200'
        ];

        if($this->method() !== 'POST')
        {
            $rules = [
                'fecha'     => 'required|date',
                'cantidad'    => 'required|regex:/^[a-z A-Z ñáéíóú 0-9 ,-.()]+$/i|min:1|max:50',
                'nombre'       => 'required|regex:/^[a-z ñáéíóú 0-9 ,-.()]+$/i|min:2|max:200'
            ];
        }
        return $rules;
        
    }
    public function messages()
    {
        return [
                'cantidad.required'  => 'La cantidad en la devolución es obligatorio.', 
                'nombre.required'    => 'La devolución debe contener un nombre válido.' 
        ];
    }
}
