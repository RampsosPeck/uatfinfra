<?php

namespace Uatfinfra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarpinteroSaveRequest extends FormRequest
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
            'serv_id'        => 'required',
            'descripcion'    => 'required|max:200',
            'responsable'    => 'required|max:50' 
        ];
        return $rules;
    }
    public function messages()
    {
        return [
                'serv_id.required' => 'La entidad solicitante es obligatoria.',
                'descripcion.max'  => 'La descripción no debe exceder los 200 caracteres.',

        ];
    }
}
