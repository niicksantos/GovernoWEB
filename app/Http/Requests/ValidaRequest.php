<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaRequest extends FormRequest
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
            'titulo' =>'required|min:5|max:100',
            'capa' => 'required|mimes:jpg,bmp,png,jpeg|max:2048',   
            'data' => 'date',
            'chamada' => 'required|min:5|max:100'
        ];
    }
}