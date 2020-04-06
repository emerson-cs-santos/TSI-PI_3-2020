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

Route::get('/produto', function () {
    return view('produto');
});

Route::get('/novos', function () {
    return view('novos');
});

Route::get('/destaque', function () {
    return view('destaque');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contato', function () {
    return view('contato');
});

// SHOPPING Fim **************************************************************************************************************************





// ADMIN - DASHBOARD Inicio **************************************************************************************************************************

Route::get('admin', 'AdminController@index')->middleware('is_admin')->name('admin');

Route::get('/usuario', function () {
    return view('admin/usuario');
});

// ADMIN - DASHBOARD Fim **************************************************************************************************************************
