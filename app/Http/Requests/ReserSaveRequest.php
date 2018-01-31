<?php

namespace Uatfinfra\Http\Requests;
use Uatfinfra\Rules\ValidKilo;
use Uatfinfra\Rules\ValidFechaIni;
use Illuminate\Foundation\Http\FormRequest;

class ReserSaveRequest extends FormRequest
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
            'startdate'   => ['required', new ValidFechaIni],
            'enddate'     => ['required', new ValidFechaIni],
            'user_id'     => 'required|numeric', 
            'entity'      => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:50', 
            'objective'   => 'required|max:200', 
            'passengers'  => ['required', new ValidKilo]

        ];

        if($this->method() !== 'POST')
        {
            $rules = [
                'startdate'   => ['required', new ValidFechaIni],
                'enddate'     => ['required', new ValidFechaIni],
                'user_id'     => 'required|numeric', 
                'entity'      => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:50', 
                'objective'   => 'required|max:200', 
                'passengers'  => ['required', new ValidKilo]
            ];
        }
        return $rules;
        
    }
    public function messages()
    {
        return [
                'startdate.required' => 'La fecha de salida del viaje es obligatorio.',
                'enddate.required'   => 'La fecha de llegada del viaje es obligatorio.',
                'user_id.required'   => 'El usuario que insertó la reserva es obligatorio.',
                'entity.required'    => 'La entidad reservante es obligatorio.',  
                'entity.regex'       => 'La entidad solo deben contener letras y números.',  
                'objective.required' => 'El objetivo del viaje es obligatorio.',
                'objective.max'      => 'El objetivo no debe pasar los 200 caracteres.',
                'passengers.required'=> 'La cantidad de pasajeros es obligatorio.'

        ];
    }
}
