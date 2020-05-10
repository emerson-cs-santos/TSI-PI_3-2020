<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function jogos()
    {
        //$produtos =  Product::paginate(8);
        $produtos = Product::selectRaw('products.*')->orderBy('name')->paginate(8);
        //$produtos =  Product::take(8);
        return view('shop.produto.jogos')->with('products',$produtos )->with('categoria','');
    }

    //public function searchCategory(Category $category)
    public function searchCategory($id)
    {
      //  dd($category->products());

    //   $produtos = DB::select('
    //     select
    //         prod.*
    //     from
    //         products prod
    //     where
    //     prod.category_id = ?', [$id] );

    //     dd($produtos);

        $produtos = Product::selectRaw('products.*')->where('category_id', '=', $id)->orderBy('name')->paginate(8);

      //  dd($produtos);

    // foreach ( $produtos as $product )
    // {
    //     dd($product);
    // }

        return view( 'shop.produto.jogos')  ->with('products', $produtos)   ->with('categoria',Category::find($id)->name );
        //return view('shop.produto.jogos')->with('products', $category->products() );
    }
}
