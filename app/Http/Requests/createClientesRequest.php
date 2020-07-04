<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createClientesRequest extends FormRequest
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
            'nombre' => 'required|max:50',
            'val_nombre' => 'unique:clients',
            'rif' => 'required|max:15',
            'val_rif' => 'unique:clients',
        ];
    }

    public function messages()
    {
        return [
            'val_nombre.unique' => 'Este cliente ya ha sido registrado en esta empresa',
            'val_rif.unique' => 'Este Rif ya ha sido registrado como cliente en esta empresa',
        ];
    }
    
}
