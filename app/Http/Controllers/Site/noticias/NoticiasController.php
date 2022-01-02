<?php

namespace App\Http\Controllers\Site\noticias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\Noticia;


class NoticiasController extends Controller
{

    public function Index() {

        $noticia = Noticia::all();
    
        return view ('site.noticias.noticias');
    }



public function ExibeNoticia($id) {

    $noticia = Noticia::all()
                        ->where('id', $id);

    return view ('site.noticias.noticia', ['noticia' => $noticia ,
                                            'id' => $id]);

}











}


