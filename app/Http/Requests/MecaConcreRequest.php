<?php

namespace Uatfinfra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MecaConcreRequest extends FormRequest
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
            'fecha'        => 'required|date',
            'cantidad'     => 'max:30',
            'nombre'       => 'max:30',
            'descripcion'  => 'required|max:200',
            'marca'        => 'max:50',
            'codigo'       => 'max:50',
            'observacion'  => 'max:200'
        ];

        return $rules;
        
    }
    public function messages()
    {
        return [
                'kilome'              => 'El kilometraje tiene que ser solo numeros.',
                'fecha.date'          => 'Inserte una fecha válida.',
                'cantidad.regex'      => 'La canidad no debe execer los 30 caracteres.',
                'nombre.regex'        => 'El nombre no debe execer los 30 caracteres.',
                'descripcion.regex'      => 'En la descripción solo se aceptan letras números.',
                'marca.regex'            => 'En la marca solo se aceptan letras y/o números.',
                'codigo.regex'           => 'En el código solo se aceptan letras y/o números.',
                'observacion.regex'      => 'La observacion solo debe contener letras y/o números.'

        ];
    }
}
