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
        Route::get('contratar/{id}',     ['as'=>'contrato.contratar',      'uses'=> 'ServicoController@contratar'] );
    });

    Route::group(['prefix'=>'redflag', 'where'=>['id'=>'[0-9]+']], function(){
        Route::get('{id}/visualizar',     ['as'=>'redflag.visualizar',      'uses'=> 'RedFlagController@index']);

        Route::get('/veraprovadas',     ['as'=>'redflag.veraprovadas',      'uses'=> 'RedFlagController@veraprovadas']);
        Route::get('/moderar',     ['as'=>'redflag.moderar',      'uses'=> 'RedFlagController@moderar']);
        Route::get('{id}/analisar',     ['as'=>'redflag.analisar',      'uses'=> 'RedFlagController@analisar']);

        Route::get('/disputes',     ['as'=>'redflag.disputes',      'uses'=> 'RedFlagController@disputes']);
        Route::get('{id}/dispute/ver',     ['as'=>'redflag.dispute.ver',      'uses'=> 'RedFlagController@disputeVer']);
//        /
        Route::get('{idredflag}/dispute/aprovar/{iddispute}',     ['as'=>'redflag.dispute.aprovar',      'uses'=> 'RedFlagController@aprovarDispute']);
        Route::get('{idredflag}/dispute/negar/{iddispute}',     ['as'=>'redflag.dispute.negar',      'uses'=> 'RedFlagController@negarDispute']);

        Route::post('/enviar',     ['as'=>'redflag.enviar',      'uses'=> 'RedFlagController@salvar']);
        Route::get('{idredflag}/aprovar/{iduser}',     ['as'=>'redflag.aprovar',      'uses'=> 'RedFlagController@aprovar']);
        Route::get('{idredflag}/negar/{iduser}',     ['as'=>'redflag.negar',      'uses'=> 'RedFlagController@negar']);
        Route::get('{id}/dispute',     ['as'=>'redflag.dispute',      'uses'=> 'RedFlagController@formDispute']);
        Route::post('{idRedflag}/senddispute',     ['as'=>'redflag.sendDispute',      'uses'=> 'RedFlagController@formDispute_send']);
    });


//    tutorial routes

    Route::group(['prefix'=>'tutorial', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('list',     ['as'=>'tutorial.list',      'uses'=> 'TutorialController@index'] );
        Route::get('edit/{id}',     ['as'=>'tutorial.edit',      'uses'=> 'TutorialController@formTutorial'] );
        Route::get('new',     ['as'=>'tutorial.new',      'uses'=> 'TutorialController@formTutorial'] );

        Route::post('newPost',     ['as'=>'tutorial.newPost',      'uses'=> 'TutorialController@newPost'] );
        Route::post('editPost/{id}',     ['as'=>'tutorial.editPost',      'uses'=> 'TutorialController@editPost'] );

        Route::get('delete/{id}',     ['as'=>'tutorial.delete',      'uses'=> 'TutorialController@delete'] );
    });





});

