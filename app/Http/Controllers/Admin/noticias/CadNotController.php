<?php

namespace App\Http\Controllers\Admin\noticias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidaRequest;
use App\Models\Site\Noticia;
use Illuminate\Support\Str;


class CadNotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexCadNoticia()
    {

        return view('admin.noticias.cadastra_noticia');

    }

    public function cadastraNoticia(ValidaRequest $request) 
    {

        $exibir = 0;
        $destaque = 0;

        if($request->exibir){
            $exibir = 1;
        }

        if($request->destaque){
            $destaque = 1;
        }

        $not = $request->validated();
        
        $noticia = new Noticia;

        $noticia->titulo = $not['titulo'];
        $noticia->data = $not['data'];
        $noticia->capa = $not['capa'];
        $noticia->chamada = $not['chamada'];
        $noticia->texto = $not['texto'];
        $noticia->url = Str::slug($not['titulo']);
        $noticia->id_categoria = 1;
        $noticia->audio = 0;
        $noticia->youtube = 0;
        $noticia->exibir = $exibir;
        $noticia->destaque = $destaque;

        $noticia->save();

        return back()->with('success', 'Notícia cadastrada com sucesso!');
        

    }
}
