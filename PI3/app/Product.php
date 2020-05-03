<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'
        ,'image'
        ,'desc'
        ,'price'
        ,'discount'
        ,'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);

        // Abaixo para laravel versão 6
        //return $this->belongsTo('App\Category');
    }

    public function produtoSaldo()
    {
        return $this->hasMany(Movimento::class, 'product_id');
        //return $this->hasMany(Movimento::class, 'product_id')->where('movimentos.tipo', '=', 'E');
        //return $this->hasMany(Movimento::class, 'product_id')->select('movimentos.quantidade as teste')->where('movimentos.tipo', '=', 'E');
        //return $this->hasMany('App\Article')->select(['id', 'title', 'user_id']);
    }

    // public function produtoSaidas()
    // {
    //     return $this->hasMany(Movimento::class, 'product_id')->where('movimentos.tipo', '=', 'S');
    // }
}

