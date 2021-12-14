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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ROTAS DO PAINEL ADM

Route::prefix('Admin')->group(function() {
    route::get('/', ['as' => 'admin.admin_index', 'uses' => 'Admin\AdminController@IndexAdmin']);




    //NOTICIAS

    route::get('/Noticia', ['as' => 'admin.noticias.cadastrar_noticia', 'uses' => 'Admin\noticias\NoticiasController@CadastraNoticia']);
    
});







