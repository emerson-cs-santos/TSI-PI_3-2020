<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'user_id'
        ,'cliente_id'
    ];

    public function usuario()
    {
     return $this->belongsTo(User::class, 'user_id');
    }

    public function pedidoTemItens()
    {
        return $this->hasMany(ItemPedido::class, 'fk_pedido', 'id');
    }

    public function valorTotal()
    {
      // $itens = $this->pedidoTemItens();

       $valores = ItemPedido::selectRaw('sum(item_pedidos.quantidade * item_pedidos.preco) as total')->where('fk_pedido', '=', $this->id)->groupBy('fk_pedido')->get();
       $valorTotal = '0';
       foreach ($valores as $valor)
       {
            $valorTotal = floatval($valor->total);
       }
        return 'R$'.number_format($valorTotal, 2);
    }
}
