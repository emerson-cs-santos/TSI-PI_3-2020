<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:categories'
            ,'image' => 'required'
            ,'desc' => 'required'
            ,'price' => 'required'
        ];
    }
}
