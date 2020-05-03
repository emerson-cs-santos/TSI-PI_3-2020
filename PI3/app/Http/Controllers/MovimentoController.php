<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimento;
use App\Product;
use App\Http\Requests\CreateMovimentoRequest;
use App\Http\Requests\EditMovimentoRequest;

class MovimentoController extends Controller
{

    public function index()
    {
        $Movimento = Movimento::paginate(5);
        return view('admin.movimento.index', ['movimentos' => $Movimento] );
    }


    public function create()
    {
        return view('admin.movimento.create');
    }


    public function store(CreateMovimentoRequest $request)
    {
        $quantidade = $request->quantidade;

        // Validação comentada abaixo está sendo feita na propria request com uma custom rule, pois a validação abaixo não mantêm os OLD values
        // $estoqueAtual = Product::find($request->fk_produto)->produtoSaldo->sum('quantidade');
        // if ( $request->tipo == 'S' || $request->quantidade > $estoqueAtual )
        // {
        //     session()->flash('error', "Saldo insuficiente em estoque! Quantidade solicitada: $quantidade, Estoque atual: $estoqueAtual");
        //     return redirect()->back();
        // }

        // Tela de movimentação não tem esse campo, apenas a de pedido
        if ( property_exists('$request','fk_origem') )
        {
            $origem = $request->fk_origem; // Origem identificada, pedido de venda
        }
        else
        {
            $origem = 0; // Origem manual
        }

        if ($request->tipo === 'S')
        {
           $quantidade = $quantidade * -1;
        }

        Movimento::create([
            'tipo'          => $request->tipo
            ,'quantidade'   => $quantidade
            ,'fk_origem'    => $origem
            ,'product_id'   => $request->fk_produto
        ]);

       session()->flash('success', 'Movimento criado com sucesso!');

        return redirect(route('movimentos.index'));
    }


    public function show(Movimento $movimento)
    {
        return view('admin.movimento.show')->with('movimento', $movimento);
    }


    public function edit(Movimento $movimento)
    {
        return view('admin.movimento.edit')->with('movimento', $movimento);
    }

    public function update(EditMovimentoRequest $request, Movimento $movimento)
    {
        $quantidade = $request->quantidade;

        // Tela de movimentação não tem esse campo, apenas a de pedido
        if ( property_exists('$request','fk_origem') )
        {
            $origem = $request->fk_origem; // Origem identificada, pedido de venda
        }
        else
        {
            $origem = 0; // Origem manual
        }

        if ($request->tipo === 'S')
        {
           $quantidade = $quantidade * -1;
        }

        $movimento->update([
            'tipo'          => $request->tipo
            ,'quantidade'   => $quantidade
            ,'fk_origem'    => $origem
            ,'product_id'   => $request->fk_produto
        ]);

        session()->flash('success', 'Movimento alterado com sucesso!');
        return redirect(route('movimentos.index'));
    }


    public function destroy($id)
    {
        $movimento = Movimento::withTrashed()->where('id', $id)->firstOrFail();

        if($movimento->trashed())
        {
            $movimento->forceDelete();
            session()->flash('success', 'Movimento removido com sucesso!');
        }
        else
        {
            $movimento->delete();
            session()->flash('success', 'Movimento movido para lixeira com sucesso!');
        }
        return redirect()->back();
    }

    public function trashed()
    {
         $movimentos = Movimento::onlyTrashed()->paginate(5);
         return view('admin.movimento.index', ['movimentos' => $movimentos]);
    }

    public function restore($id)
    {
        $movimento = Movimento::withTrashed()->where('id', $id)->firstOrFail();
        $movimento->restore();

        session()->flash('success', 'Movimento ativado com sucesso!');
        return redirect()->back();
    }
}
