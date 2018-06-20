<?php

namespace Uatfinfra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoSaveRequest extends FormRequest
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
            'kilome'        => 'required', 
            'justificacion' => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:200',
            'idh'           => 'required',
            'cant1'         => 'required',
            'med1'          => 'required',
            'des1'          => 'required'
        ];

        if($this->method() !== 'POST')
        {
            $rules = [
            'kilome'        => 'required', 
            'justificacion' => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:200',
            'idh'           => 'required',
            'cant1'         => 'required',
            'med1'          => 'required',
            'des1'          => 'required'
            ];
        }
        return $rules;
    }
    public function messages()
    {
        return [
                'kilome.required'   => 'El capo kilometraje es obligatorio.',

        ];
    }
}
