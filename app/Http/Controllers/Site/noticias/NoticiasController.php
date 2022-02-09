<?php

namespace App\Http\Controllers\Site\noticias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\Noticia;


class NoticiasController extends Controller
{


    public function getNoticias() {
        return Noticia::where('ativo', 1)
                        ->orderBy('data','desc')
                        ->where('id_categoria', 1)
                        ->paginate(12);
    }


    public function indexNoticias() {

        $noticias = $this->getNoticias();
    
        return view ('site.noticias.noticias', ['noticias' => $noticias]);
    }



    public function exibeNoticia($id) {

        $noticia = Noticia::all()
                            ->where('id', $id);

        return view ('site.noticias.noticia', ['noticia' => $noticia ,
                                                'id' => $id]);

}











}


