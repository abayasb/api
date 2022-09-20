<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProveedorRespuest extends FormRequest
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
            'codproveedor'=>'required|max:20|unique:proveedors,codproveedor,'.$this->route('proveedor')->id,
            'nombre_ape'=>'required|max:150',
            'direccion'=>'required|max:250',
            'email'=>'required|unique:proveedors,email,'.$this->route('proveedor')->id,
            'telefono'=>'required|max:10'
        ];
    }
}
