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

Route::get('/registrar', 'UsuarioController@registrar')->name('registrar');
Route::post('/salvar', 'UsuarioController@salvar')->name('salvar');
Route::post('/salvar', 'UsuarioController@salvar')->name('salvar');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'AutenticacaoController@privada')->name('dashboard');
    Route::get('/myprofile', 'UsuarioController@myProfile')->name('myProfile');
});