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


        $noticias = Noticia::orderBy('id','desc')
                            ->where('id_categoria', 1)
                            ->get();
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
            return redirect()->route('pesquisa_noticia');
        }

    }

    public function editAction(Request $request, $id)
    {

        $noticia = Noticia::find($id);

        $capa = $noticia->capa;

        if($request->hasFile('capa_edit')){
            $filename = $request->capa_edit->getClientOriginalName();
            $nome_arquivo = "{$filename}";
            $capa = $request->capa_edit->storeAs('fotos', $nome_arquivo);
        }


        $noticia->titulo = $request->titulo;
        $noticia->data = $request->data;
        $noticia->capa = $capa;
        $noticia->chamada = $request->chamada;
        $noticia->texto = $request->texto;
        $noticia->url = Str::slug($request->titulo);

        $noticia->save();

        //dd($noticia);

        return redirect()->route('pesquisa_noticia')
                         ->with('success', 'Notícia editada com sucesso!');
    }


    public function deleteNoticia($id)
    {
        Noticia::find($id)->delete();

        return redirect()->route('pesquisa_noticia')
                         ->with('success', 'Notícia excluída com sucesso!');;

    }


    public function exibeNoticia($id)
    {
        $noticia = Noticia::find($id);
        
        $noticia->exibir = 1 - $noticia->exibir;

        $noticia->save();

        return redirect()->route('pesquisa_noticia');
    }


    public function destaqueNoticia($id)
    {
        $noticia = Noticia::find($id);
        
        $noticia->destaque = 1 - $noticia->destaque;

        $noticia->save();

        return redirect()->route('pesquisa_noticia');
    }



}
