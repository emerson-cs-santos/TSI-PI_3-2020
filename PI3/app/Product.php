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

    public function category(){
        return $this->belongsTo(Category::class);

        // Abaixo para laravel versão 6
        //return $this->belongsTo('App\Category');
    }    
}
