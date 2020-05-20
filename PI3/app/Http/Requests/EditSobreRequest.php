<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSobreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Titulo' => 'required'
            ,'Texto' => 'required'
        ];
    }
}
