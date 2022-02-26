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

        dd($result_page);

        $noticias = Noticia::paginate(15);

        //dd($noticias);

        return view('admin.noticias.pesquisa_noticia', ['noticias' => $noticias]);

    }




}
