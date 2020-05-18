<?php

namespace App\Rules;
use App\Product;

use Illuminate\Contracts\Validation\Rule;

class VerSaldo implements Rule
{
    private $mensagemErro = '';

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function passes($attribute, $value)
    {
        $tipo           = $this->data['tipo'];
        $quantidade     = $this->data['quantidade'];
        $produtoID      = $this->data['fk_produto'];

        // Validação de produto não encontrado vai ser exibida, por isso não precisa passar ou exibir essa validação
        if ( is_null( Product::find( $produtoID  ) ) )
        {
            return true;
        }

        if ( $produtoID == 0 ) // Sem essa proteção, a função abaixo para buscar o saldo do produto, ocorre erro quando produto está vazio
        {
            return true;
        }
        $estoqueAtual  = Product::find( $produtoID )->produtoSaldo->sum('quantidade');

        if ( $tipo == 'S' && $quantidade > $estoqueAtual )
        {
            $this->mensagemErro = "Saldo insuficiente em estoque! Quantidade solicitada: $quantidade , Estoque atual: $estoqueAtual";
            return false;
        }
        else
        {
            return true;
        }
    }

    public function message()
    {
        return $this->mensagemErro;
    }
}
