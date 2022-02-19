<?php

namespace App\Http\Controllers\Admin\noticias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidaRequest;

class NoticiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function indexCadNoticia()
    {

        return view('Admin.noticias.cadastrar_noticia');


    }



    public function cadastraNoticia(ValidaRequest $request) 
    {
        $titulo = $request->validated();

        dd($titulo);
       
    }
}