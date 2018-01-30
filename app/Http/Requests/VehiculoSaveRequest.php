<?php

namespace Uatfinfra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoSaveRequest extends FormRequest
{
    /**VehiculoSaveRequest 
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
            'oil_id'        => 'required|max:50',
            'user_id'       => 'max:5',
            'kilometraje'   => 'max:12', 
            'estado'        => 'required|in:ÓPTIMO,MANTENIMIENTO,DESUSO',
            'placa'         => 'required|regex:/^[0-9 A-Z -_ ]+$/i|between:4,10|unique:vehiculos,placa', 
            'tipo'          => 'required|alpha|max:40',
            'especificacion'=> 'max:50',
            'cilindrada'    => 'max:50',
            'chasis'        => 'max:50',
            'motor'         => 'max:70',
            'marca'         => 'max:40', 
            'modelo'        => 'max:40',
            'pasajeros'     => 'required|max:3', 
            'color'         => 'max:50'
          
        ];

        if($this->method() !== 'POST')
        {
            $rules = [
                'oil_id'        => 'required|max:50',
                'user_id'       => 'max:5',
                'kilometraje'   => 'max:12', 
                'estado'        => 'required|in:ÓPTIMO,MANTENIMIENTO,DESUSO',
                'placa'         => 'required|regex:/^[0-9 A-Z -_ ]+$/i|between:4,10', 
                'tipo'          => 'required|alpha|max:40',
                'especificacion'=> 'max:50',
                'cilindrada'    => 'max:50',
                'chasis'        => 'max:50',
                'motor'         => 'max:70',
                'marca'         => 'max:40', 
                'modelo'        => 'max:40',
                'pasajeros'     => 'required|max:3', 
                'color'         => 'max:50'
            ];
        }
        return $rules;
        
    }
    public function messages()
    {
        return [
                'oil_id.max'     => 'En el combustible no se deben exceder los 50 caracteres.',
                'user_id.max'    => 'En la asignación no deben exceder los 5 asignados.',
                'kilometraje.max'=> 'En el kilometraje no deben exceder los 12 caracteres.', 
                'estado.required'=> 'El estado del vehículo es obligatorio.', 
                'estado.in'      => 'En el estado solo se aceptan una de las tres opciones.', 
                'placa.required' => 'La placa es obligatorio', 
                'placa.regex'    => 'En la placa solo se aceptan números y letras mayusculas con un guion.', 
                'placa.between'  => 'La placa de contener de 4 hasta 10 caracteres.', 
                'placa.unique'   => 'La placa del vehículo ya fue registrada.'

        ];
    }
}
