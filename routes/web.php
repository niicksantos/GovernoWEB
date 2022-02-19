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

    route::get('/Noticia', ['as' => 'admin.noticias.cadastrar_noticia', 'uses' => 'Admin\noticias\NoticiasController@indexCadNoticia']);
    route::post('/Noticia', ['as' => 'admin.noticias.cadastrar_noticia', 'uses' => 'Admin\noticias\NoticiasController@cadastraNoticia']);
    


});







