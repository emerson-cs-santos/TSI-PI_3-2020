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
        return view('sobre2');
    }
}
