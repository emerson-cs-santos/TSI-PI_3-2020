<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimento extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'tipo'
        ,'quantidade'
        ,'fk_origem'
        ,'product_id'
    ];

    public function produto()
    {
     return $this->belongsTo(Product::class, 'product_id');
    }
}
