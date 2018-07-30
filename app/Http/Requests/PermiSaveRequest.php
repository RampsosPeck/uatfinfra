<?php

namespace Uatfinfra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermiSaveRequest extends FormRequest
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
            'user_id'       => 'required', 
            'motivo'        => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:150',
            'fecha'         => 'required|date',
            'dias'          => 'required',
            'tipo'          => 'required'
        ];

        if($this->method() !== 'POST')
        {
            $rules = [  
            'motivo'        => 'required|regex:/^[a-z 0-9 ñáéíóú -_ . ]+$/i|max:150',
            'fecha'         => 'required|date',
            'dias'          => 'required',
            'tipo'          => 'required'
            ];
        }
        return $rules;
    }
    public function messages()
    {
        return [
                'user_id.required'   => 'El capo conductor es obligatorio.',
        ];
    }
}
