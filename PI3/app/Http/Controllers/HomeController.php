<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $itemPorPagina = 4;

    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function index()
    {
        //return view('home');

        $carrossel      = Product::all()->take(3);
        $lancamentos    = Product::all()->sortByDesc('id')->take(4);
        $maisVendidos   = Product::all()->sortBy('id')->take(4); // Trocar para select de fato vendo nos pedidos

        return view('index')    ->with( 'carrossel_produtos', $carrossel )  ->with('lancamentos', $lancamentos) ->with('maisVendidos', $maisVendidos) ;
    }

    public function jogos()
    {
        //$produtos =  Product::paginate(8);
        $produtos = Product::selectRaw('products.*')->orderBy('name')->paginate($this->itemPorPagina);
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

        $produtos = Product::selectRaw('products.*')->where('category_id', '=', $id)->orderBy('name')->paginate($this->itemPorPagina);

      //  dd($produtos);

    // foreach ( $produtos as $product )
    // {
    //     dd($product);
    // }

        return view( 'shop.produto.jogos')  ->with('products', $produtos)   ->with('categoria',Category::find($id)->name );
        //return view('shop.produto.jogos')->with('products', $category->products() );
    }


    public function searchCategoryTeste(Category $category)
    {
      //  dd($produtos);

    // foreach ( $produtos as $product )
    // {
    //     dd($product);
    // }

    //  return view('shop.produto.jogos')->with('products', $category->products()->get() )->with('categoria','');
        return view('shop.produto.jogos')->with('products', $category->products()->paginate($this->itemPorPagina) )->with('categoria','');
    }

    public function novos_shop()
    {
        //$lancamentos = Product::all()->sortByDesc('id');

        $lancamentos = Product::selectRaw('products.*')->orderBy('id','desc')->paginate(6);

        return view('shop.produto.novos')  ->with('lancamentos', $lancamentos);
    }

    public function destaque_shop()
    {
       // $maisVendidos = Product::all()->sortByDesc('id')->take(4);
        $maisVendidos = Product::selectRaw('products.*')->orderBy('id','desc')->paginate(4);

        return view('shop.produto.destaque')  ->with('maisVendidos', $maisVendidos);
    }

    public function produto_loja($id)
    {
        $produto = Product::find($id);
        return view('shop.produto.produto')  ->with('produto', $produto);
    }
}
