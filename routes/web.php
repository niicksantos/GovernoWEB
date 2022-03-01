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


//SITE

Route::prefix('/')->group(function() {
  
    route::get('/', ['as' => 'index', 'uses' => 'Site\HomeController@indexSite']);
    route::get('/home', ['as' => 'home', 'uses' => 'Site\HomeController@indexSite']);


    //NOTICIAS

    route::get('Noticias', ['as' => 'noticias.noticias', 'uses' => 'Site\noticias\NoticiasController@indexNoticias']);
    route::get('Noticia/{id}', ['as' => 'noticias.noticia', 'uses' => 'Site\noticias\NoticiasController@exibeNoticia']);


    //LEGISLAÇÃO
    route::get('Legislacao', ['as' => 'legislacao.legislacao', 'uses' => 'Site\legislacao\LegislacaoController@indexLegislacao']);
    route::post('Legislacao', ['as' => 'legislacao.legislacao', 'uses' => 'Site\legislacao\LegislacaoController@indexLegislacao']);



});








// ROTAS DO PAINEL ADM

Route::prefix('Admin')->group(function() {
    route::get('/', ['as' => 'admin.admin_index', 'uses' => 'Admin\AdminController@indexAdmin']);



    //NOTICIAS

    route::get('/cadNoticia', ['as' => 'admin.noticias.cadastra_noticia', 'uses' => 'admin\noticias\CadNotController@indexCadNoticia']);
    route::post('/cadNoticia', ['as' => 'admin.noticias.cadastra_noticia', 'uses' => 'admin\noticias\CadNotController@cadastraNoticia']);

    route::resource('/pesqNoticia', ['as' => 'admin.noticias.pesquisa_noticia', 'uses' => 'admin\noticias\PesqNotController@indexPesqNoticia']);

    route::get('/editNoticia/{id}', ['as' => 'edit_noticia', 'uses' => 'admin\noticias\PesqNotController@editNoticia']);
    route::post('/editNoticia/{id}', ['as' => 'edit_noticia', 'uses' => 'admin\noticias\PesqNotController@editNoticia']);

    route::get('/editNoticiaSave/{id}', ['as' => 'edita_noticia', 'uses' => 'admin\noticias\PesqNotController@editAction']);
    route::post('/editNoticiaSave/{id}', ['as' => 'edita_noticia', 'uses' => 'admin\noticias\PesqNotController@editAction']);

    route::get('/pesqNoticiaDel/{id}', ['as' => 'deleta_noticia', 'uses' => 'admin\noticias\PesqNotController@deleteNoticia']);
    route::post('/pesqNoticiaDel/{id}', ['as' => 'deleta_noticia', 'uses' => 'admin\noticias\PesqNotController@deleteNoticia']);

    route::get('/exibeNoticia/{id}', ['as' => 'exibe_noticia', 'uses' => 'admin\noticias\PesqNotController@exibeNoticia']);
    route::post('/exibeNoticia/{id}', ['as' => 'exibe_noticia', 'uses' => 'admin\noticias\PesqNotController@exibeNoticia']);

    route::get('/destaqueNoticia/{id}', ['as' => 'destaque_noticia', 'uses' => 'admin\noticias\PesqNotController@destaqueNoticia']);
    route::post('/destaqueNoticia/{id}', ['as' => 'destaque_noticia', 'uses' => 'admin\noticias\PesqNotController@destaqueNoticia']);

});







