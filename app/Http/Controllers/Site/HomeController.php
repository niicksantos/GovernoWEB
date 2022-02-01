<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\Slider;
use App\Models\Site\Noticia;
use App\Models\Site\Parlamentar;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    
    public function HomeSite() {
        return redirect()->route('home');
    }

    public function IndexSite() {

        $contslider = 0;
        $slider = Slider::all() ->where('exibir', 1);
        $noticia = Noticia::all()->sortByDesc('id')
                                 ->take(5);
                                 
        $destaque = Noticia::all() ->where('id_categoria', 1)
                                    ->where('destaque', 1);

        $videos = Noticia::all() ->where('id_categoria', 3)
        ->where('destaque', 0);

        $videos_d = Noticia::all() ->where('id_categoria', 3)
                                    ->where('destaque', 1);

        $parlamentares = Parlamentar::all() ->where('ativo', 1);
        
       /* $presidente = Parlamentar::all() ->where('mesa_diretora', 1)
                                         ->where('cargo_mesa_diretora', 'Presidente');*/

        $presidente = DB::table('sitefox_vereador')->where('cargo_mesa_diretora', 'Presidente')
                                                    ->where('id_legislatura', 2)
                                                    ->join('sitefox_vereador_legislatura', 'sitefox_vereador.id', '=', 'sitefox_vereador_legislatura.id_vereador')
                                                    ->get();


//dd($presidente);

        return view('site.home', ['contslider' => $contslider,
                                  'slider' => $slider,
                                  'destaque' => $destaque,
                                  'noticia' =>$noticia,
                                  'videos' => $videos,
                                  'videos_d' => $videos_d,
                                  'parlamentares' => $parlamentares,
                                  'presidente' => $presidente

                                    ]);
                                    
                                    

    }


}
