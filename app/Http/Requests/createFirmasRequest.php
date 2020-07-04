<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createFirmasRequest extends FormRequest
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
            //
            'nombre'=>['required', 'string', 'max:50', 'unique:firmas'], 
            'slug'=>['required', 'string', 'max:10', 'unique:firmas'], 
            'rif'=>['required', 'string', 'max:15', 'unique:firmas'],
        ];
    }
}
