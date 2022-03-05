<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site\Slider;
use App\Models\Site\Noticia;
use App\Models\Site\MsgAlerta;
use App\Models\Site\Parlamentar;
use App\Repositories\LegislacaoRepository;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homeSite()
    {
        return redirect()->route('home');
    }

    public function indexSite(LegislacaoRepository $legislacaoRepository)
    {
        $contslider = 0;
        $slider = Slider::all() ->where('exibir', 1);

        $msg_alerta = MsgAlerta::all() ->where('ativo', 1);

        $noticia = Noticia::all()->sortByDesc('id')
                                ->where('id_categoria', 1)
                                ->where('exibir', 1)
                                ->where('destaque', 0)
                                ->where('ativo', 1)
                                ->take(4);
                                 
        $destaque = Noticia::all() ->where('id_categoria', 1)
                                    ->where('destaque', 1);

        $videos = Noticia::all() ->where('id_categoria', 3)
                                    ->where('destaque', 0)
                                    ->where('ativo', 1)
                                    ->sortByDesc('data')
                                    ->take(4);

        $videos_d = Noticia::all() ->where('id_categoria', 3)
                                    ->where('destaque', 1);

        $parlamentares = Parlamentar::where('sitefox_vereador.ativo', 1)
                                            ->where('cargo_mesa_diretora', '<>', 'Presidente')
                                            ->where('id_legislatura', 2)
                                            ->join('sitefox_vereador_legislatura AS svl', 'sitefox_vereador.id', '=', 'svl.id_vereador')
                                            ->join('sitefox_legislatura AS sl', 'sl.id', '=', 'svl.id_legislatura')
                                            ->orderBy('nome')
                                            ->get();
        
        $presidente = DB::table('sitefox_vereador AS sv')->where('cargo_mesa_diretora', 'Presidente')
                                                    ->where('id_legislatura', 2)
                                                    ->join('sitefox_vereador_legislatura AS svl', 'sv.id', '=', 'svl.id_vereador')
                                                    ->join('sitefox_legislatura AS sl', 'sl.id', '=', 'svl.id_legislatura')
                                                    ->get();

        $especiesNormativas = $legislacaoRepository->getLegislacoesPorTipo(1);
        $legislacoesTema = $legislacaoRepository->getLegislacoesPorTipo(2);
                                                    
        $legislacao['especiesNormativas'] = $especiesNormativas;
        $legislacao['temas'] = $legislacoesTema;
        $legislacao['autores'] = $legislacaoRepository->getLegislacoesPorVereador();
        $legislacao['situacoes'] = $legislacaoRepository->getLegislacoesPorSituacao();
        


        return view('site.home', [
            'contslider' => $contslider,
            'slider' => $slider,
            'destaque' => $destaque,
            'noticia' =>$noticia,
            'videos' => $videos,
            'videos_d' => $videos_d,
            'parlamentares' => $parlamentares,
            'presidente' => $presidente,
            'legislacao' => $legislacao,
            'especiesNormativas'=> $especiesNormativas,
            'legislacoesTema' => $legislacoesTema,
            'msg_alerta' => $msg_alerta
        ]);
    }
}
