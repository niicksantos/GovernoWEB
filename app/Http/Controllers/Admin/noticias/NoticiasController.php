<?php

namespace App\Http\Controllers\Admin\noticias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function CadastraNoticia() {
        return view('admin.noticias.cadastrar_noticia');
    }
}
