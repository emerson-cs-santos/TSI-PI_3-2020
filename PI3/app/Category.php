<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable =['name'];

    public function products()
    {
        Return $this->hasMany(Product::class, 'category_id');


     //   return $this->hasMany(Product::class, 'category_id')->where('product.id', '=', 'product.category_id');
    }
}
