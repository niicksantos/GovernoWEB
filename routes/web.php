<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\configuracao\MensagemAlertaController;

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


//SITE

Route::prefix('/')->group(function() {
  
    route::get('/', ['as' => 'index', 'uses' => 'Site\HomeController@indexSite']);
    route::get('/home', ['as' => 'home', 'uses' => 'Site\HomeController@indexSite']);


    //NOTICIAS

    route::get('Noticias', ['as' => 'noticias.noticias', 'uses' => 'Site\noticias\NoticiasController@indexNoticias']);
    route::get('Noticia/{id}', ['as' => 'noticias.noticia', 'uses' => 'Site\noticias\NoticiasController@exibeNoticia']);


    //LEGISLAÇÃO
    route::get('Legislacao', ['as' => 'legislacao.legis', 'uses' => 'Site\legislacao\LegislacaoController@indexLegislacao']);
    route::post('Legislacao', ['as' => 'legislacao.legislacao', 'uses' => 'Site\legislacao\LegislacaoController@indexLegislacao']);



});








// ROTAS DO PAINEL ADM

Route::prefix('Admin')->group(function() {
    route::get('/', ['as' => 'Admin.Admin_index', 'uses' => 'Admin\AdminController@indexAdmin']);


    //MENSAGEM DE ALERTA

    route::get('/msgAlerta', ['as' => 'msg_alerta', 'uses' => 'Admin\configuracao\MensagemAlertaController@indexMensagem']);


    //NOTICIAS

    route::get('/cadNoticia', ['as' => 'cad_noticia', 'uses' => 'Admin\noticias\CadNotController@indexCadNoticia']);
    route::post('/cadNoticia', ['as' => 'cadastra_noticia', 'uses' => 'Admin\noticias\CadNotController@cadastraNoticia']);

    route::get('/pesqNoticia', ['as' => 'pesquisa_noticia', 'uses' => 'Admin\noticias\PesqNotController@indexPesqNoticia']);

    route::get('/editNoticia/{id}', ['as' => 'edit_not', 'uses' => 'Admin\noticias\PesqNotController@editNoticia']);
    route::post('/editNoticia/{id}', ['as' => 'edit_noticia', 'uses' => 'Admin\noticias\PesqNotController@editNoticia']);

    route::get('/editNoticiaSave/{id}', ['as' => 'edita_noticia', 'uses' => 'Admin\noticias\PesqNotController@editAction']);
    route::post('/editNoticiaSave/{id}', ['as' => 'editar_noticia', 'uses' => 'Admin\noticias\PesqNotController@editAction']);

    route::get('/pesqNoticiaDel/{id}', ['as' => 'del_noticia', 'uses' => 'Admin\noticias\PesqNotController@deleteNoticia']);
    route::post('/pesqNoticiaDel/{id}', ['as' => 'deleta_noticia', 'uses' => 'Admin\noticias\PesqNotController@deleteNoticia']);

    route::get('/exibeNoticia/{id}', ['as' => 'exibe_noticia', 'uses' => 'Admin\noticias\PesqNotController@exibeNoticia']);
    route::post('/exibeNoticia/{id}', ['as' => 'exibir_noticia', 'uses' => 'Admin\noticias\PesqNotController@exibeNoticia']);

    route::get('/destaqueNoticia/{id}', ['as' => 'dest_noticia', 'uses' => 'Admin\noticias\PesqNotController@destaqueNoticia']);
    route::post('/destaqueNoticia/{id}', ['as' => 'destaque_noticia', 'uses' => 'Admin\noticias\PesqNotController@destaqueNoticia']);

});


