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

    public function cadastraNoticia(Request $request) 
    {
        $teste = json_decode($request->input('titulo_noticia'));

        dd($teste);    





        return view('Admin.noticias.cadastrar_noticia',['teste' => $teste
            
                                                        
                                                        ]);
    }
}
