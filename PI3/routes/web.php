<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuario_shop', 'Shop\usuarioShopController@usuario');

Route::get('/produto_shop', function () {
    return view('produto');
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

    //Clientes
    Route::resource('clientes', 'ClientesController');
});














// ADMIN - DASHBOARD Fim **************************************************************************************************************************
