<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// SHOPPING Inicio **************************************************************************************************************************

Route::get('/', function ()
{
    return view('index')->with('products', Product::all());

    // if ( Auth::check() )
    // {
    //     if( Auth::user()->isAdmin() )
    //     {
    //         return view('admin.index');
    //     }
    //     else
    //     {
    //         return view('index')->with('products', Product::all());
    //     }
    // }
    //return view('index')->with('products', Product::all()->take(3));
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuario_shop', 'Shop\usuarioShopController@usuario');
Route::get('/usuario_senha', 'Shop\usuarioShopController@usuarioSenha');

Route::get('/jogos_shop', function () {
    return view('jogos')->with('products', Product::all());
});


Route::get('/novos_shop', function () {
    return view('novos');
});

Route::get('/destaque_shop', function () {
    return view('destaque');
});

Route::get('/blog_shop', function () {
    return view('blog');
});

Route::get('/contato_shop', function () {
    return view('contato');
});

Route::get('/produto_shop', function () {
    return view('produto');
});

// SHOPPING Fim **************************************************************************************************************************





// ADMIN - DASHBOARD Inicio **************************************************************************************************************************

Route::get('admin', 'AdminController@index')->middleware('is_admin')->name('admin');

Route::middleware('auth')->group(function()
{
    // Usuarios
    Route::resource('Users','UsersController');
    Route::get('trashed-Users','UsersController@trashed')->name('trashed-Users.index');
    Route::put('restore-Users/{category}','UsersController@restore')->name('restore-Users.update');

    // Categorias
    Route::resource('categories','CategoriesController');
    Route::get('trashed-categories','CategoriesController@trashed')->name('trashed-categories.index');
    Route::put('restore-categories/{category}','CategoriesController@restore')->name('restore-categories.update');

    // Produtos
    Route::resource('products','ProductsController');
    Route::get('trashed-product','ProductsController@trashed')->name('trashed-product.index');
    Route::put('restore-product/{product}','ProductsController@restore')->name('restore-product.update');

    // Clientes
    Route::resource('clientes', 'ClientesController');
    Route::get('trashed-cliente', 'ClientesController@trashed')->name('trashed-cliente.index');
    Route::put('restore-cliente/{cliente}', 'ClientesController@restore')->name('restore-cliente.update');

    // Carrinhos


    // Pedidos


    // Movimentações
    Route::resource('movimentos', 'MovimentoController');
    Route::get('trashed-movimentos', 'MovimentoController@trashed')->name('trashed-movimentos.index');
    Route::put('restore-movimentos/{movimento}', 'MovimentoController@restore')->name('restore-movimentos.update');
});














// ADMIN - DASHBOARD Fim **************************************************************************************************************************
