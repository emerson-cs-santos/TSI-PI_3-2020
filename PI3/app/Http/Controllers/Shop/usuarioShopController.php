<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class usuarioShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function usuario()
    {
        return view('shop.usuario.usuarioShop');
    }

    public function usuarioSenha()
    {
        return view('shop.usuario.usuarioShopSenha');
    }
}
