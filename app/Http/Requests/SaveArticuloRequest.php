<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveArticuloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codarticulo'=>'required|max:20|unique:articulos,codarticulo',
            'detalle'=>'required|max:250',
            'stock'=>'min:1|required',
            'valorcompra'=>'required|min:0',
            'valorventa'=>'required:min:0',
            'id_marca'=>'required',
            'id_tipo'=>'required'
        ];
    }
}
