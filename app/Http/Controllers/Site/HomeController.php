<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\LegislacaoTipo;
use App\Http\Controllers\Controller;
use App\Models\Site\Legislacao;
use Illuminate\Http\Request;
use App\Models\Site\Slider;
use App\Models\Site\Noticia;
use App\Models\Site\Parlamentar;
use App\Models\Site\LegislacaoSituacao;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function HomeSite()
    {
        return redirect()->route('home');
    }

    public function IndexSite()
    {
        $contslider = 0;
        $slider = Slider::all() ->where('exibir', 1);
        $noticia = Noticia::all()->sortByDesc('id')
                                 ->where('destaque', 0)
                                 ->take(4);
                                 
        $destaque = Noticia::all() ->where('id_categoria', 1)
                                    ->where('destaque', 1);

        $videos = Noticia::all() ->where('id_categoria', 3)
        ->where('destaque', 0);

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
        
        $legislacao['especiesNormativas'] = LegislacaoTipo::where('ativo', true)->where('tipo', 1)->get();
        $legislacao['temas'] = LegislacaoTipo::where('ativo', true)->where('tipo', 2)->get();
        $legislacao['autores'] = $parlamentares;
        $legislacao['situacoes'] = LegislacaoSituacao::orderBy('nome')->where('ativo', 1)->get();

        
        $especiesNormativas = $this->getLegislacoes(1);
        $legislacoesTema = $this->getLegislacoes(2);

        return view('site.home', ['contslider' => $contslider,
                                  'slider' => $slider,
                                  'destaque' => $destaque,
                                  'noticia' =>$noticia,
                                  'videos' => $videos,
                                  'videos_d' => $videos_d,
                                  'parlamentares' => $parlamentares,
                                  'presidente' => $presidente,
                                  'legislacao' => $legislacao,
                                  'especiesNormativas'=> $especiesNormativas,
                                  'legislacoesTema' => $legislacoesTema
                                    ]);
    }

    protected function getLegislacoes(int $tipo)
    {
        return Legislacao::selectRaw('sitefox_legislacao_tipo.nome, sitefox_legislacao_tipo.id, count(sitefox_legislacao_tipo.id) as count')
        ->join('sitefox_legislacao_tipo', 'sitefox_legislacao.id_tipo', 'sitefox_legislacao_tipo.id')
        ->groupBy('sitefox_legislacao_tipo.nome')
        ->groupBy('sitefox_legislacao_tipo.id')
        ->where('sitefox_legislacao_tipo.tipo', $tipo)
        ->get();
    }
}
