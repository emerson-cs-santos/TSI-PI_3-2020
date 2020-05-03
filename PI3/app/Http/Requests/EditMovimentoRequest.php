<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\VerSaldo;
use App\Rules\ProdutoQuantidadeNegativa;

class EditMovimentoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo'          => 'required'
            ,'quantidade'   => [ 'required', new ProdutoQuantidadeNegativa ,new VerSaldo( request()->all() ) ]
            ,'fk_produto'   => 'required'
        ];
    }
}
