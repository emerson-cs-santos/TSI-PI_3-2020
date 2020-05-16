<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Auth::routes();

// SHOPPING Inicio **************************************************************************************************************************

// HomeController
Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

// Jogos
Route::get('/jogos_shop', 'HomeController@jogos');
Route::get('/search/category/{id}', 'HomeController@searchCategory')->name('search-category');
Route::get('/novos_shop', 'HomeController@novos_shop');
Route::get('/destaque_shop', 'HomeController@destaque_shop');
Route::get('/produto_loja/{id}', 'HomeController@produto_loja')->name('produto-loja');

Route::middleware('auth')->group(function()
{
    // Usuario
    Route::get('/usuario_shop', 'Shop\usuarioShopController@usuario')->name('usuario-shop');
    Route::get('/usuario_senha', 'Shop\usuarioShopController@usuarioSenha')->name('usuario-senha');
    Route::put('usuario-atualizar','Shop\usuarioShopController@updateUserShop')->name('usuario-atualizar');
    Route::put('usuario-atualizar-senha','Shop\usuarioShopController@updateUserShopSenha')->name('usuario-atualizar-senha');

    // Carrinho
    Route::get('carrinho-shop-index', 'Shop\ComprasController@carrinho_index')->name('carrinho-shop-index');
    Route::post('carrinho-shop-store/{produtoID}', 'Shop\ComprasController@carrinho_store')->name('carrinho-shop-store');
    Route::delete('carrinho-shop-destroy/{produtoID}', 'Shop\ComprasController@carrinho_destroy')->name('carrinho-shop-destroy');
    Route::get('carrinho-shop-finalizar', 'Shop\ComprasController@carrinho_finalizar')->name('carrinho-shop-finalizar');
    Route::delete('carrinho-shop-limpar/{id_user}', 'Shop\ComprasController@carrinho_limpar')->name('carrinho-shop-limpar');

    // Pedido
    Route::get('pedido-shop-index', 'Shop\ComprasController@pedido_Shop_index')->name('pedido-shop-index');
    Route::get('pedido-shop-cancelado', 'Shop\ComprasController@pedido_Shop_cancelado')->name('pedido-shop-cancelado');
    Route::delete('pedido-shop-cancelar/{id}', 'Shop\ComprasController@pedido_Shop_cancelar')->name('pedido-shop-cancelar');
    Route::get('item-pedido-shop-index/{id}', 'Shop\ComprasController@item_pedido_Shop_index')->name('item-pedido-shop-index');
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

    // Carrinho
    Route::resource('carrinho','CarrinhoController');
    Route::get('trashed-carrinho','CarrinhoController@trashed')->name('trashed-carrinho.index');
    Route::put('restore-carrinho/{category}','CarrinhoController@restore')->name('restore-carrinho.update');

    // Pedido e item
    Route::get('/index-pedido', 'PedidoController@index_pedido')->name('index-pedido');
    Route::delete('pedido-destroy/{id}', 'PedidoController@destroy')->name('pedido.destroy');
    Route::get('trashed-pedido', 'PedidoController@trashed')->name('trashed-pedido.index');
    Route::put('restore-pedido/{id}', 'PedidoController@restore')->name('restore-pedido.update');
    Route::get('/item-pedido/{idPedido}','PedidoController@index_itensPedido')->name('item-pedido');

    // Movimentações
    Route::resource('movimentos', 'MovimentoController');
    Route::get('trashed-movimentos', 'MovimentoController@trashed')->name('trashed-movimentos.index');
    Route::put('restore-movimentos/{movimento}', 'MovimentoController@restore')->name('restore-movimentos.update');
});

// ADMIN - DASHBOARD Fim **************************************************************************************************************************
