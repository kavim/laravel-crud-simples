<?php

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
    return view('welcome');
});

Route::get('/ola', function () {
    return 'Hello World';
});

Route::resource('/painel/produtos/','Painel\ProdutoController');

Route::get('/painel/produtos/','Painel\ProdutoController@index')->name('produtos.index');

Route::get('/painel/produtos/tests','Painel\ProdutoController@tests');
Route::get('painel/produtos/create','Painel\ProdutoController@create');

Route::get('painel/produtos/{id}/edit', 'Painel\ProdutoController@edit')->name('produtos.edit');
Route::get('painel/produtos/{id}', 'Painel\ProdutoController@update')->name('produtos.update');
Route::get('painel/produtos/{id}/show', 'Painel\ProdutoController@show')->name('produtos.show');
Route::delete('painel/produtos/{id}', 'Painel\ProdutoController@destroy')->name('produtos.destroy');
