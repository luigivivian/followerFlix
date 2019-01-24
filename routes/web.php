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

Route::get('/', 'AutenticacaoController@home')->name('home');
Route::get('/login', 'AutenticacaoController@login')->name('login');
Route::post('/logar', 'AutenticacaoController@logar')->name('logar');
Route::get('/logout', 'AutenticacaoController@logout')->name('logout');

Route::get('/registrar/{token}', 'UsuarioController@registrar')->name('registrar');
Route::post('/salvar', 'UsuarioController@salvar')->name('salvar');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/myprofile', 'UsuarioController@myProfile')->name('myprofile');
    Route::get('/getprofissional', 'UsuarioController@profissionalFilter')->name('getprofissional');
    Route::get('/ativarconta', 'UsuarioController@ativarConta')->name('ativarconta');
    Route::post('/comprarativacao/{id}', 'AtivacaoController@comprarAtivacao')->name('comprarativacao');
    Route::get('/confirmarativacao', 'AtivacaoController@confirmarAtivacao')->name('confirmarativacao');


    Route::group(['prefix'=>'user', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('{id}/edit',     ['as'=>'user.edit',      'uses'=> 'UsuarioController@myProfile'] );
        Route::get('/buscar',     ['as'=>'user.buscar',      'uses'=> 'UsuarioController@buscarUsuario'] );
        Route::put('{id}/update',   ['as'=>'user.update',    'uses'=> 'UsuarioController@update'] );
        Route::put('{id}/updatepassword',   ['as'=>'user.updatepassword',    'uses'=> 'UsuarioController@updatePassword'] );
        Route::get('search',   ['as'=>'user.search',    'uses'=> 'UsuarioController@procurarUsuario'] );
        Route::get('filter',   ['as'=>'user.filter',    'uses'=> 'UsuarioController@filtrar'] );
    });

    Route::group(['prefix'=>'contrato', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('{id}/visualizar',     ['as'=>'contrato.visualizar',      'uses'=> 'ServicoController@visualizar'] );
    });

    Route::group(['prefix'=>'redflag', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('{id}/visualizar',     ['as'=>'redflag.visualizar',      'uses'=> 'RedFlagController@index'] );
        Route::get('/moderar',     ['as'=>'redflag.moderar',      'uses'=> 'RedFlagController@moderar'] );
        Route::get('{id}/analisar',     ['as'=>'redflag.analisar',      'uses'=> 'RedFlagController@analisar'] );
        Route::post('/enviar',     ['as'=>'redflag.enviar',      'uses'=> 'RedFlagController@salvar'] );
    });

});