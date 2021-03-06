<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    public function usuario()
    {
     return $this->belongsTo(User::class, 'user_id');
    }
}
