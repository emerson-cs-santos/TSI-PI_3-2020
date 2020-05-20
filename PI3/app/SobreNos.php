<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SobreNos extends Model
{
    protected $fillable =
    [
        'pagina'
        ,'titulo'
        ,'texto'
    ];
}
