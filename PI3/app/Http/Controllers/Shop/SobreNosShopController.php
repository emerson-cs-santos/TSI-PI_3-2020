<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SobreNos;

class SobreNosShopController extends Controller
{
    public function sobreShop_quemsomos()
    {
        $quemSomos = SobreNos::all()->where('pagina','quemSomos')->first();

        if ( $quemSomos == null )
        {
            session()->flash('error', "Página não encontrada!");
            return redirect()->back();
        }

        return view('shop.sobre.quemSomos')->with('quemSomos', $quemSomos);
    }

    public function sobreShop_contato()
    {
        $contato = SobreNos::all()->where('pagina','contato')->first();

        if ( $contato == null )
        {
            session()->flash('error', "Página não encontrada!");
            return redirect()->back();
        }

        return view('shop.sobre.contato')->with('contato', $contato);
    }
}
