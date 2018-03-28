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
                'fecha.date'          => 'Inserte una fecha válida.',
                'cantidad'            => 'La canidad no debe execer los 30 caracteres.',
                'nombre'              => 'El nombre no debe execer los 30 caracteres.',
                'descripcion'         => 'En la descripción no debe exceder los 200 caracteres.',
                'marca'               => 'En la marca no debe exceder los 50 caracteres.',
                'codigo'              => 'En el código no debe exceder los 50 caracteres.',
                'observacion'         => 'La observacion no debe exceder los 200 caracteres.'

        ];
    }
}
