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

    public function indexPesqNoticia()
    {

        $noticias = Noticia::all();

        return view('admin.noticias.pesquisa_noticia', $noticias);

    }




}
