<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sobreController extends Controller
{
    //
    public function about()
    {
        return view('sobre');
    }

    //
    public function about2()
    {

        $variavel = 'teste';

        return view('sobre2')->with('nomela',$variavel);
    }
}
