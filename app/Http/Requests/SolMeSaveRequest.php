<?php

namespace Uatfinfra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolMeSaveRequest extends FormRequest
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
            'vehiculo_id' => 'required',
            'descripcion' => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:200'
        ];

        if($this->method() !== 'POST')
        {
            $rules = [
            'vehiculo_id' => 'required',
            'descripcion' => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:200'
            ];
        }
        return $rules;
        
    }
    public function messages()
    {
        return [
                'vehiculo_id.required'   => 'Seleccione un vehículo, por que es obligatorio.',
                'descripción.regex'      => 'En este campo solo se aceptan letras números.'

        ];
    }
}
