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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    //painel
    Route::get('/', 'HomeController@index')->name('painel');
    Route::get('/painel', 'HomeController@index')->name('painel');
    
    //cliente
    Route::get('cliente/adicionar', 'ClienteController@adicionar');
    Route::get('cliente/listar', 'ClienteController@listar');
    Route::post('cliente/salvar', 'ClienteController@salvar');
    Route::get('cliente/{id}/editar', 'ClienteController@editar');
    Route::patch('cliente/{id}', 'ClienteController@atualizar');    
    Route::delete('clientes/{id}', 'ClienteController@deletar');
    Route::get('cliente/{id}/info', 'ClienteController@info');
    Route::get('cliente/{id}/imprimir', 'ClienteController@imprimir');
    
    //categoria
    Route::get('categoria/adicionar', 'CategoriaController@adicionar');
    Route::post('categoria/salvar', 'CategoriaController@salvar');
    Route::get('categoria/listar', 'CategoriaController@listar');
    Route::get('categoria/{id}/editar', 'CategoriaController@editar');
    Route::patch('categoria/{id}', 'CategoriaController@atualizar');
    Route::delete('categoria/{id}', 'CategoriaController@deletar');

     //subcategoria
    Route::get('subcategoria/adicionar', 'SubcategoriaController@adicionar');
    Route::post('subcategoria/salvar', 'SubcategoriaController@salvar');
    Route::get('subcategoria/listar', 'SubcategoriaController@listar');
    Route::get('subcategoria/{id}/editar', 'SubcategoriaController@editar');
    Route::patch('subcategoria/{id}', 'SubcategoriaController@atualizar');
    Route::delete('subcategoria/{id}', 'SubcategoriaController@deletar');

    //marca
    Route::get('marca/adicionar', 'MarcaController@adicionar');
    Route::post('marca/salvar', 'MarcaController@salvar');
    Route::get('marca/listar', 'MarcaController@listar');
    Route::get('marca/{id}/editar', 'MarcaController@editar');
    Route::patch('marca/{id}', 'MarcaController@atualizar');
    Route::delete('marca/{id}', 'MarcaController@deletar');

    //produto
    Route::get('produto/adicionar', 'ProdutoController@adicionar');
    Route::post('produto/salvar', 'ProdutoController@salvar');
    Route::get('produto/listar', 'ProdutoController@listar');
    Route::get('produto/{id}/editar', 'ProdutoController@editar');
    Route::patch('produto/{id}', 'ProdutoController@atualizar');
    Route::delete('produto/{id}', 'ProdutoController@deletar');
    Route::get('subcategorias/{id}', 'ProdutoController@getTowns');



}); 
