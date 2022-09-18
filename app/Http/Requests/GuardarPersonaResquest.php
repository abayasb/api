<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarPersonaResquest extends FormRequest
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
           "cedula" => "required|unique:personas,cedula|max:10",
           "nombre" => "required|max:150",
           "apellido" => "required|max:150",
           "edad" => "required",
           "sexo" => "required|max:15",
           "email" =>"required|email:rfc,dns",
           "telefono"=>"required|max:10"
        ];
    }
}
