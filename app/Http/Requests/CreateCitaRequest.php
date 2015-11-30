<?php

namespace Oral_Plus\Http\Requests;

use Oral_Plus\Http\Requests\Request;

class CreateCitaRequest extends Request
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
        return [
            'fecha'            => 'required|date',
            'hora'             => 'required',
            'valor_consulta'   => 'required|numeric',
            'id_usuario'       => 'required',
            'id_especialista'  => 'required'
        ];
    }
}
