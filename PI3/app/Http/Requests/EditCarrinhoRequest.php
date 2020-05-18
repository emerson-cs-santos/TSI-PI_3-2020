<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ProdutoQuantidadeNegativa;

class EditCarrinhoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Produto' => 'required'
            ,'Usuario' => 'required'
            ,'Quantidade' => [ 'required', 'max:9', new ProdutoQuantidadeNegativa ]
        ];
    }
}
