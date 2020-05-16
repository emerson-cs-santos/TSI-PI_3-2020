<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ProdutoQuantidadeNegativa;

class CreateCarrinhoRequest extends FormRequest
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
            ,'Quantidade' => [ 'required', new ProdutoQuantidadeNegativa ]
        ];
    }
}
