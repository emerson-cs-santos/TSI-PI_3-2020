<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\User;
use App\Movimento;
use App\ItemPedido;

class PedidoController extends Controller
{
    public function __construct()
    {
       $this->middleware('is_admin');
    }

    public function index_pedido()
    {
        $pedido = Pedido::paginate(5);
        return view('admin.pedido.index', ['pedidos' => $pedido]);
    }

    public function index_itensPedido($idPedido)
    {
        $itemPedido = ItemPedido::selectRaw('item_pedidos.*')->where('fk_pedido', '=', $idPedido)->orderBy('id')->paginate(8);
        $pedido     = Pedido::withTrashed()->find($idPedido);
        return view('admin.pedido.pedido', ['itensPedido' => $itemPedido] )->with( ['pedido' => $pedido] );
    }

    public function destroy($id)
    {
        $pedido = Pedido::withTrashed()->where('id', $id)->firstOrFail();

        if($pedido->trashed())
        {
            $pedido->forceDelete();
            session()->flash('success', 'Pedido removido do sistema com sucesso!');
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

    public function trashed()
    {
        $pedido = Pedido::onlyTrashed()->paginate(5);
        return view('admin.pedido.index', ['pedidos' => $pedido]);
    }

    public function restore($id)
    {
        $pedido = Pedido::withTrashed()->where('id', $id)->firstOrFail();
        $pedido->restore();
        session()->flash('success', 'Pedido ativado com sucesso!');
        return redirect()->back();
    }

}
