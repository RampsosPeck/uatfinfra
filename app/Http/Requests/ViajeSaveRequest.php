<?php

namespace Uatfinfra\Http\Requests;

use Uatfinfra\Rules\ValidKilo;
use Uatfinfra\Rules\ValidFechaIni;
use Illuminate\Foundation\Http\FormRequest;

class ViajeSaveRequest extends FormRequest
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
            'destino1'     => 'required|numeric',
            'kilo1'        => 'required|numeric',
            'destino2'     => 'required|numeric',
            'kilo2'        => 'required|numeric',
            'adicional'    => 'required|numeric',
            'totalkm'      => ['required', new ValidKilo],
            'tipo'         => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:50',
            'encargado'    => 'required|numeric',
            'conductor'    => 'required',
            'vehiculo_id'  => 'required|numeric',
            'entidad'      => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:50',
            'dias'         => 'required|regex:/^[a-z 0-9 -_ . áéíóúñ ]+$/i|max:20',
            'pasajeros'    => 'required|numeric',
            'fecha_inicial'=> ['required', new ValidFechaIni],
            'horainicial'  => 'required',
            'fecha_final'  => ['required', new ValidFechaIni],
            'horafinal'    => 'required',
            'categoria'    => 'required',
            'combustible'  => 'required|numeric', 
            'precio'       => 'required|numeric',
            'nota'         => 'required|max:250',
            'recurso'      => 'required',
            'ruta1'        => 'max:200',
            'ruta2'        => 'max:200'
        ];

        if($this->method() !== 'POST')
        {
            $rules = [
                'destino1'     => 'required|numeric',
                'kilo1'        => 'required|numeric',
                'destino2'     => 'required|numeric',
                'kilo2'        => 'required|numeric',
                'adicional'    => 'required|numeric',
                'totalkm'      => ['required', new ValidKilo],
                'tipo'         => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:50',
                'encargado'    => 'required|numeric',
                'conductor'    => 'required',
                'vehiculo_id'  => 'required|numeric',
                'entidad'      => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:50',
                'dias'         => 'required|regex:/^[a-z 0-9 -_ . ]+$/i|max:20',
                'pasajeros'    => 'required|numeric',
                'fecha_inicial'=> ['required', new ValidFechaIni],
                'horainicial'  => 'required',
                'fecha_final'  => ['required', new ValidFechaIni],
                'horafinal'    => 'required',
                'categoria'    => 'required',
                'combustible'  => 'required|numeric', 
                'precio'       => 'required|numeric',
                'nota'         => 'required|max:250',
                'recurso'      => 'required',
                'ruta1'        => 'max:200',
                'ruta2'        => 'max:200'
            ];
        }
        return $rules;
        
    }
    public function messages()
    {
        return [
                'destino1.required'     => 'El destino de ida es obligatio.',
                'destino2.required'     => 'El retorno del viaje es obligatio.',     
                'tipo.required'         => 'El campo tipo de viaje es obligatio.',
                'tipo.regex'            => 'En el tipo de viaje solo de aceptan letras, números, puntos y guines.',
                'vehiculo_id.required'  => 'El vehiculo es obligatorio.',
                'fecha_inicial.required'=> 'La fecha de partida es obligatorio.',
                'horainicial.required'  => 'La hora de partida es obligatorio.',
                'fecha_final.required'  => 'La fecha de llegada es obligatorio.',
                'horafinal.required'    => 'La hora de llegada es obligatorio.',
                'categoria.required'    => 'Seleccione una categoría!!!', 
                'nota.required'         => 'Ingrese un dato u/o nota al viaje porque es obligatio.', 
                'recurso.required'      => 'El tipo de recurso del viaje es obligatorio!!!', 
                'ruta1.max'             => 'Esta primera ruta no debe exeder los 200 caracteres.', 
                'ruta2.max'             => 'Esta segunda ruta no debe exeder los 200 caracteres.'
        ];
    }
}
