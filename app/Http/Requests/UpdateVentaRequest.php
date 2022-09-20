<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVentaRequest extends FormRequest
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
            'codventa'=>'required|max:20|unique:ventas,codventa,'.$this->route('venta')->id,
            'cantidad'=>'required|min:0',
            'valor'=>'required|min:0',
            'totalventa'=>'required|min:0',
            'id_articulo'=>'required',
            'id_users'=>'required'
        ];
    }
}
