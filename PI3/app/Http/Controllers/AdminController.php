<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carrinho;
use App\Product;
use App\ItemPedido;
use App\User;
use App\Pedido;
use App\Movimento;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // Total do carrinho
        $totalCarrinho = 0;

        $carrinhosSomar = Carrinho::selectRaw('carrinhos.product_id, sum(carrinhos.quantidade) as qtd_total')
        ->groupBy('carrinhos.product_id')
        ->orderBy('carrinhos.product_id')
        ->get();

        foreach ($carrinhosSomar as $cart)
        {
            $produto        = Product::withTrashed()->find($cart->product_id);
            $subTotal       = $cart->qtd_total * $produto->price;
            $totalCarrinho  = $totalCarrinho + $subTotal;
        }

        // Total do Pedido
        $totalPedido = '0';

        $valores = ItemPedido::selectRaw('sum(item_pedidos.quantidade * item_pedidos.preco) as total')
        ->join('pedidos', 'pedidos.id', '=', 'item_pedidos.fk_pedido')
        ->where('pedidos.deleted_at',null)
        ->groupBy('item_pedidos.fk_pedido')
        ->get();

        foreach ($valores as $valor)
        {
             $totalPedido = $totalPedido + floatval($valor->total);
        }

        // Total de usuários
        $totalUsuarios = User::all()->count();

        // Movimentação total de estoque
        $totalEstoque = Movimento::all()->sum('quantidade');


        // Relatórios

        // Movimentação de estoque recente
        $movimentacaoRecente = Movimento::selectRaw('movimentos.*')
        ->orderByDesc('movimentos.id')
        ->paginate(5);

        // Pedidos recentes
        $pedidosRecente = Pedido::selectRaw('pedidos.*')
        ->orderByDesc('pedidos.id')
        ->paginate(5);


        return view('admin.index')
            ->with('totalCarrinho'          ,   $totalCarrinho)
            ->with('totalPedido'            ,   $totalPedido)
            ->with('totalUsuarios'          ,   $totalUsuarios)
            ->with('totalEstoque'           ,   $totalEstoque)
            ->with('movimentacaoRecente'    ,   $movimentacaoRecente)
            ->with('pedidosRecente'         ,   $pedidosRecente);
    }
}
