<?php

namespace App\Http\Controllers\Admin\noticias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidaRequest;
use App\Models\Site\Noticia;
use Illuminate\Support\Str; 

class PesqNotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexPesqNoticia(Request $request)
    {

        $result_page = $request->resultados;

        //dd($result_page);

        $noticias = Noticia::orderBy('id','desc')
                            ->where('id_categoria', 1)
                            ->get();
        //dd($noticias);

        return view('admin.noticias.pesquisa_noticia', ['noticias' => $noticias]);

    }


    public function editNoticia($id)
    {
        $noticia = Noticia::find($id);

        //dd($noticia);

    
        if($noticia) {
            return view('admin.noticias.edita_noticia', [
                        'noticia' => $noticia
            ]);
        } else {
            return redirect()->route('admin.noticias.pesquisa_noticia');
        }

    }


    public function editAction(Request $request, $id)
    {

        $noticia = Noticia::find($id);

        $capa = $noticia->capa_edit;

        if($request->capa_edit != '') {
            
            $capa = $request->capa_edit;
        }

        // dd($capa);

        $noticia->titulo = $request->titulo;
        $noticia->data = $request->data;
        $noticia->capa = $capa->store('fotos');
        $noticia->chamada = $request->chamada;
        $noticia->texto = $request->texto;
        $noticia->url = Str::slug($request->titulo);

        $noticia->save();

        return back()->with('success', 'Notícia cadastrada com sucesso!');
    }


    public function deleteNoticia($id)
    {
        Noticia::find($id)->delete();

        return redirect()->route('admin.noticias.pesquisa_noticia');

    }

}
