<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrinho;
use App\Product;
use App\User;
use App\Pedido;
use App\Http\Requests\CreateCarrinhoRequest;
use App\Http\Requests\EditCarrinhoRequest;

class CarrinhoController extends Controller
{
    public function __construct()
    {
       $this->middleware('is_admin');
    }

    public function index()
    {
        $carrinho = Carrinho::paginate(5);
        return view('admin.carrinho.index', ['carrinhos' => $carrinho]);
    }


    public function create()
    {
        return view('admin.carrinho.create');
    }


    public function store(CreateCarrinhoRequest $request)
    {
        if ( is_null( Product::find( $request->Produto ) ) )
        {
            $produtoNaoEncontrado = $request->Produto;
            session()->flash('error', "Produto não encontrado: $produtoNaoEncontrado!");
            return redirect()->back();
        }

        if ( is_null( User::find( $request->Usuario ) ) )
        {
            $usuarioNaoEncontrado = $request->Usuario;
            session()->flash('error', "Usuário não encontrado: $usuarioNaoEncontrado!");
            return redirect()->back();
        }

        $produtoCodigo  = $request->Produto;
        $produtoNome    = Product::find( $request->Produto)->name;
        $estoqueAtual   = Product::find( $request->Produto )->produtoSaldo->sum('quantidade');
        $quantidade     = $request->Quantidade;

        if ( $quantidade > $estoqueAtual )
        {
            $mensagemErro = "Saldo insuficiente em estoque para o produto ID: $produtoCodigo($produtoNome)! Quantidade solicitada: $quantidade , Estoque atual: $estoqueAtual";
            session()->flash('error', $mensagemErro);
            return redirect()->back();
        }

        Carrinho::create([
            'product_id'    => $request->Produto
            ,'user_id'      => $request->Usuario
            ,'quantidade'   => $request->Quantidade
        ]);

       session()->flash('success', 'Produto adicionado com sucesso!');

        return redirect(route('carrinho.index'));
    }


    public function show(Carrinho $carrinho)
    {
        return view('admin.carrinho.show')->with('carrinho', $carrinho);
    }


    public function edit(Carrinho $carrinho)
    {
        return view('admin.carrinho.edit')->with('carrinho', $carrinho);
    }


    public function update(EditCarrinhoRequest $request, Carrinho $carrinho)
    {
        if ( is_null( Product::find( $request->Produto ) ) )
        {
            $produtoNaoEncontrado = $request->Produto;
            session()->flash('error', "Produto não encontrado: $produtoNaoEncontrado!");
            return redirect()->back();
        }

        if ( is_null( User::find( $request->Usuario ) ) )
        {
            $usuarioNaoEncontrado = $request->Usuario;
            session()->flash('error', "Usuário não encontrado: $usuarioNaoEncontrado!");
            return redirect()->back();
        }

        $produtoNome    = Product::find( $request->Produto)->name;
        $estoqueAtual   = Product::find( $request->Produto )->produtoSaldo->sum('quantidade');

        $quantidade     = $request->Quantidade;

        if ( $quantidade > $estoqueAtual )
        {
            $mensagemErro = "Saldo insuficiente em estoque para o produto $produtoNome! Quantidade solicitada: $quantidade , Estoque atual: $estoqueAtual";
            session()->flash('error', $mensagemErro);
            return redirect()->back();
        }

        $carrinho->update([
            'product_id'    => $request->Produto
            ,'user_id'      => $request->Usuario
            ,'quantidade'   => $request->Quantidade
        ]);

        session()->flash('success', 'Carrinho alterado com sucesso!');
        return redirect(route('carrinho.index'));
    }


    public function destroy($id)
    {
        $carrinho = Carrinho::withTrashed()->where('id', $id)->firstOrFail();

        if($carrinho->trashed())
        {
            $carrinho->forceDelete();
            session()->flash('success', 'Carrinho removido com sucesso!');
        }
        else
        {
            $carrinho->delete();
            session()->flash('success', 'Carrinho movido para lixeira com sucesso!');
        }
        return redirect()->back();
    }

    public function trashed()
    {
        $carrinho = Carrinho::onlyTrashed()->paginate(5);
        return view('admin.carrinho.index', ['carrinhos' => $carrinho]);
    }

    public function restore($id)
    {
        $carrinho = Carrinho::withTrashed()->where('id', $id)->firstOrFail();
        $carrinho->restore();
        session()->flash('success', 'Carrinho ativado com sucesso!');
        return redirect()->back();
    }
}