<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carrinho;
use App\Product;
use App\User;
use App\Movimento;
use App\Pedido;
use App\ItemPedido;

class ComprasController extends Controller
{
    public function carrinho_index()
    {
        // Select para testes
        // select
        //     carrinhos.product_id
        //     ,sum(carrinhos.quantidade) as qtd_total
        // from
        //     carrinhos
        // where
        //     user_id = 2 and deleted_at is null
        // group by
        //     carrinhos.product_id
        // order by
        //     carrinhos.product_id
        $itens = Carrinho::selectRaw('carrinhos.product_id, products.name, sum(carrinhos.quantidade) as qtd_total')
        ->join('products', 'products.id', '=', 'carrinhos.product_id')
        ->where('user_id', '=', auth()->user()->id )
        ->groupBy('carrinhos.product_id','products.name')
        ->orderBy('products.name')
        ->paginate(4);

        return view('shop.usuario.carrinho_shop')->with( 'itens', $itens ) ;
    }


    public function carrinho_store($produtoID)
    {
        if ( is_null( Product::find( $produtoID ) ) )
        {
            $produtoNaoEncontrado = $produtoID;
            session()->flash('error', "Produto não encontrado: $produtoNaoEncontrado!");
            return redirect()->back();
        }

        $userID = auth()->user()->id;

        if ( is_null( User::find( $userID ) ) )
        {
            $usuarioNaoEncontrado = $userID;
            session()->flash('error', "Usuário não encontrado: $usuarioNaoEncontrado!");
            return redirect()->back();
        }

        $produtoNome    = Product::find( $produtoID )->name;
        $estoqueAtual   = Product::find( $produtoID )->produtoSaldo->sum('quantidade');
        $quantidade     = 1;

        if ( $quantidade > $estoqueAtual )
        {
            $mensagemErro = "Jogo ($produtoNome) não possui estoque disponível!";
            session()->flash('error', $mensagemErro);
            return redirect()->back();
        }

        Carrinho::create([
            'product_id'    => $produtoID
            ,'user_id'      => $userID
            ,'quantidade'   => 1
        ]);

       session()->flash('success', 'Produto adicionado com sucesso!');

       return redirect()->back();
    }


    public function carrinho_destroy($produtoID)
    {
        $Itens = Carrinho::withTrashed()
            ->where('user_id', auth()->user()->id )
            ->where('product_id', $produtoID)
            ->get();

        foreach ($Itens as $item)
        {
            $item->forceDelete();
        }

        session()->flash('success', 'Produto removido do carrinho com sucesso!');
        return redirect()->back();
    }


    public function carrinho_finalizar()
    {

        $carrinhoQtd = Carrinho::withTrashed()->where('user_id', '=', auth()->user()->id )->count();

        if ( $carrinhoQtd == 0 )
        {
            session()->flash('error', "Não há produtos no carrinho!");
            return redirect()->back();
        }

        $userID = auth()->user()->id;

        if ( is_null( User::find( $userID ) ) )
        {
            $usuarioNaoEncontrado = $userID;
            session()->flash('error', "Usuário não encontrado: $usuarioNaoEncontrado!");
            return redirect()->back();
        }

        // Checar estoque
       // $Itens = Carrinho::all()->where('user_id', auth()->user()->id );

        $Itens = Carrinho::selectRaw('carrinhos.product_id, sum(carrinhos.quantidade) as quantidade')
        ->where('user_id', '=', auth()->user()->id )
        ->groupBy('carrinhos.product_id')
        ->get();

        foreach ($Itens as $item)
        {
            $produtoID    = $item->product_id;

            if ( is_null( Product::find( $produtoID ) ) )
            {
                $produtoNaoEncontrado = $produtoID;
                session()->flash('error', "Produto não encontrado: $produtoNaoEncontrado!");
                return redirect()->back();
            }

            $produtoNome    = Product::find( $produtoID )->name;
            $estoqueAtual   = Product::find( $produtoID )->produtoSaldo->sum('quantidade');
            $quantidade     = $item->quantidade;

            if ( $quantidade > $estoqueAtual )
            {
                $mensagemErro = "Jogo ($produtoNome) não possui estoque disponível!";
                session()->flash('error', $mensagemErro);
                return redirect()->back();
            }
        }

        // Gerar pedido
        $pedido = Pedido::create([ 'user_id' => $userID ]);

        // Gerar itens do pedido
        // Gerar Movimentação de estoque
        foreach ($Itens as $item)
        {
            $produto = Product::find( $item->product_id );

            // Gerar item do pedido de venda
            ItemPedido::create([
                'fk_pedido'    => $pedido->id
                ,'product_id'  => $produto->id
                ,'quantidade'  => $item->quantidade
                ,'preco'       => $produto->price
            ]);

            // Gerar movimento de saida com origem pedido
            Movimento::create([
                'tipo'          => 'S'
                ,'quantidade'   => $item->quantidade*-1
                ,'fk_origem'    => $pedido->id
                ,'product_id'   => $produto->id
            ]);

        }

        // Deletar itens do carrinho do usuário
        $ItensApagar = Carrinho::withTrashed()
            ->where('user_id', auth()->user()->id )
            ->get();

        foreach ($ItensApagar as $itemApagar)
        {
            $itemApagar->forceDelete();
        }

        $pedido = $pedido->id;
        session()->flash('success', "Compra finalizada com sucesso! O número do seu pedido é $pedido!");
        return redirect(route('pedido-shop-index'));
    }

    public function pedido_Shop_index()
    {
     //   $pedido = Pedido::withTrashed()->where('user_id', '=', auth()->user()->id )->paginate(5);

        $pedido = Pedido::withTrashed()->selectRaw('pedidos.*')
        ->where('user_id', '=', auth()->user()->id )
        ->orderByDesc('pedidos.id')
        ->paginate(6);

        return view('shop.usuario.pedido_shop', ['pedidos' => $pedido]);
    }

    public function pedido_Shop_cancelado()
    {
        session()->flash('error', "Pedido já está cancelado!");
        return redirect()->back();
    }

    public function pedido_Shop_cancelar($id)
    {
        $pedido = Pedido::withTrashed()->where('id', $id)->firstOrFail();

        if($pedido->trashed())
        {
            session()->flash('error', "Pedido já está cancelado!");
            return redirect()->back();
        }
        else
        {
            $Itens = ItemPedido::all()->where('fk_pedido',$id);

            foreach ($Itens as $item)
            {
                Movimento::create([
                    'tipo'          => 'E'
                    ,'quantidade'   => $item->quantidade
                    ,'fk_origem'    => $pedido->id
                    ,'product_id'   => $item->product_id
                ]);
            }

            $pedido->delete();
            session()->flash('success', "Pedido Nro $id cancelado com sucesso!");
        }
        return redirect()->back();
    }

    public function item_pedido_Shop_index($id)
    {
        $itemPedido = ItemPedido::selectRaw('item_pedidos.*')->where('fk_pedido', '=', $id)->orderByDesc('id')->paginate(8);
        $pedido     = Pedido::withTrashed()->find($id);
        return view('shop.usuario.itemPedidoShop', ['itensPedido' => $itemPedido] )->with( ['pedido' => $pedido] );
    }

    public function carrinho_limpar($id_user)
    {
        // Deletar itens do carrinho do usuário
        $ItensApagar = Carrinho::withTrashed()
            ->where('user_id', $id_user )
            ->get();

        foreach ($ItensApagar as $itemApagar)
        {
            $itemApagar->forceDelete();
        }

        session()->flash('success', "Carrinho foi esvaziado com sucesso!");
        return redirect()->back();
    }
}
