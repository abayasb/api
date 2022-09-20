<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProveedorRespuest extends FormRequest
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
            'codproveedor'=>'required|max:20|unique:proveedors,codproveedor',
            'nombre_ape'=>'required|max:150',
            'direccion'=>'required|max:250',
            'email'=>'required|email:rfc,dns',
            'telefono'=>'required|max:10'
        ];
    }
}
