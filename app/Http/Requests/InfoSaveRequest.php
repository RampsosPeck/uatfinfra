<?php

namespace Uatfinfra\Http\Requests;
use Uatfinfra\Rules\ValidKilo;
use Uatfinfra\Rules\ValidFechaIni;
use Illuminate\Foundation\Http\FormRequest;

class InfoSaveRequest extends FormRequest
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
            'vehiculo_id'    => 'required|numeric',
            'conductor'      => 'required|numeric',
            'fecha_inicial'  => ['required', new ValidFechaIni],
            'horainicial'    => 'required',
            'fecha_final'    => ['required', new ValidFechaIni],
            'horafinal'      => 'required',
            'categoria'      => 'required',
            'dias'           => 'required|regex:/^[a-z 0-9 -_ . ]+$/i|max:20',
            'pasajeros'      => 'required|numeric',
            'informe'        => 'required|max:250',
            'recomendacion'  => 'max:250',
            'kmpartida'      => 'required|numeric',
            'kmllegada'      => 'required|numeric',
            'kmtotal'        => ['required', new ValidKilo],
            'peaje'          => 'max:5',
            'imprevisto'     => 'max:5',
            'descripcion'    => 'max:250',

        ];

        if($this->method() !== 'POST')
        {
            $rules = [
                'entidad' => 'required|regex:/^[a-z ñáéíóú -_ . ]+$/i|max:50',
                'name'    => 'required|regex:/^[a-z ñáéíóú . ]+$/i|max:50',
                'cedula'  => 'required|regex:/^[0-9 A-Z a-z]+$/i|between:6,10', 
                'type'    => 'required',
                'position'=> 'required',
                'active'  => 'required'
            ];
        }
        return $rules;
        
    }
    public function messages()
    {
        return [
                'vehiculo_id.required'  => 'Elija un vehiculo.',
                'conductor.required'    => 'Elija un conductor.',
                'fecha_inicial.required'=> 'La fecha de partida es obligatorio.',
                'horainicial.required'  => 'La hora de partida es obligatorio.',
                'fecha_final.required'  => 'La fecha de llegada es obligatorio.',
                'horafinal.required'    => 'La hora de llegada es obligatorio.',
                'kmpartida.required'    => 'El km. de partida es Obligatorio.',
                'kmllegada.required'    => 'El km. de llegada es Obligatorio.',
                'position.required'  => 'La posición es obligatorio.',
                'active.required'    => 'El permiso es obligatorio.'

        ];
    }
}
