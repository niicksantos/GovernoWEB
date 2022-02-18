<?php

namespace App\Http\Controllers\Admin\noticias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cadastraNoticia() {
        return view('Admin.noticias.cadastrar_noticia');
    }
}
