<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSenhaShopRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'SenhaAtual'                => 'required'
            ,'password'                 => 'required|required_with:password_confirmation|same:password_confirmation|min:8'
            ,'password_confirmation'    => 'required|min:8'
        ];
    }
}
