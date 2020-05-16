<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrinho extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'product_id'
        ,'user_id'
        ,'quantidade'
        ,'fk_pedido'
    ];

    public function produto()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function usuario()
    {
     return $this->belongsTo(User::class, 'user_id');
    }
}
