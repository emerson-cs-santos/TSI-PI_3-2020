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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

// Admin
Route::get('admin', 'AdminController@index')->middleware('is_admin')->name('admin');

// Shop
Route::get('/home', 'HomeController@index')->name('home');

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




Route::get('/usuario', function () {
    return view('admin/usuario');
});






