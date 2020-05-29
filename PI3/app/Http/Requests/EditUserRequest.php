<?php

namespace App\Http\Requests;
use App\Rules\UserEmail;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                      => 'required|min:3'
            ,'email'                    => [ 'required', 'email:filter', new UserEmail( request()->all() ) ]
            ,'password'                 => 'required_with:password_confirmation|same:password_confirmation|min:8'
            ,'password_confirmation'    => 'min:8'
            ,'imagem'                   => 'max:2000'

            // ,'email'                    => 'required|email:filter|unique:users,email,'.auth()->user()->id
            //,'type'                     => 'required'
            //,'imagem'                   => 'file|max:2000' , file obriga a ter um arquivo
        ];
    }
}
