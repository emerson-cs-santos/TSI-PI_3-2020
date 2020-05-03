<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProdutoQuantidadeNegativa implements Rule
{

    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {
        if ($value < 0 )
        {
            return false;
        }
        else
        {
            return true;
        }
    }


    public function message()
    {
        return 'Quantidade de movimentação inválida!';
    }
}
