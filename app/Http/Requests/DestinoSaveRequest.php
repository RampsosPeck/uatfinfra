<?php

namespace Uatfinfra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinoSaveRequest extends FormRequest
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
            'origen'     => 'required|regex:/^[a-z A-Z ñáéíóú 0-9 ,-.()]+$/i|min:5|max:50',
            'destino'    => 'required|regex:/^[a-z A-Z ñáéíóú 0-9 ,-.()]+$/i|min:5|max:50',
            'ruta'       => 'required|regex:/^[a-z ñáéíóú 0-9 ,-.()]+$/i|max:200',
            'dep_inicio' => 'required',
            'dep_final'  => 'required',
            'kilometraje'=> 'required|between:1,6'
        ];

        if($this->method() !== 'POST')
        {
            $rules = [
                'origen'     => 'required|regex:/^[a-z A-Z ñáéíóú 0-9 ,-.()]+$/i|min:5|max:50',
                'destino'    => 'required|regex:/^[a-z A-Z ñáéíóú 0-9 ,-.()]+$/i|min:5|max:50',
                'ruta'       => 'required|regex:/^[a-z ñáéíóú 0-9 ,-.()]+$/i|max:200',
                'dep_inicio' => 'required',
                'dep_final'  => 'required',
                'kilometraje'=> 'required|between:1,6'
            ];
        }
        return $rules;
        
    }
    public function messages()
    {
        return [
                'origen.required'    => 'El lugar de partida es obligatorio.',
                'origen.regex'       => 'En el origen se aceptan letras, números,guines,parentesis y puntos.',
                'origen.max'         => 'En el depto. de partida solo se aceptan 50 caracteres.',
                'destino.required'   => 'El lugar de llegada es obligatorio.',
                'destino.regex'      => 'En el llegada se aceptan letras, números,guines,parentesis y puntos.',
                'destino.max'        => 'En el depto. de llegada solo se aceptan 50 caracteres.',

        ];
    }
}
