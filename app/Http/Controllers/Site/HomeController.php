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
    public function homeSite()
    {
        return redirect()->route('home');
    }

    public function indexSite()
    {
        $contslider = 0;
        $slider = Slider::all() ->where('exibir', 1);

        $noticia = Noticia::all()->sortByDesc('id')
                                ->where('id_categoria', 1)
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
        
        $legislacao['especiesNormativas'] = $this->getLegislacoesPorTipo(1);
        $legislacao['temas'] = $this->getLegislacoesPorTipo(2);
        $legislacao['autores'] = $this->getLegislacoesPorVereador();
        $legislacao['situacoes'] = $this->getLegislacoesPorSituacao();
                                            
        $especiesNormativas = $this->getLegislacoesPorTipo(1);
        $legislacoesTema = $this->getLegislacoesPorTipo(2);

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

    protected function getLegislacoesPorVereador()
    {
        return Legislacao::selectRaw('sitefox_vereador.id, sitefox_vereador.nome, count(sitefox_vereador.id) as count')
        ->join('sitefox_vereador', 'sitefox_legislacao.id_vereador', 'sitefox_vereador.id')
        ->groupBy('sitefox_vereador.id')
        ->groupBy('sitefox_vereador.nome')
        ->get();
    }

    protected function getLegislacoesPorSituacao()
    {
        return Legislacao::selectRaw('sitefox_legislacao_situacao.id, sitefox_legislacao_situacao.nome, count(sitefox_legislacao_situacao.id) as count')
        ->join('sitefox_legislacao_situacao', 'sitefox_legislacao.id_situacao', 'sitefox_legislacao_situacao.id')
        ->groupBy('sitefox_legislacao_situacao.id')
        ->groupBy('sitefox_legislacao_situacao.nome')
        ->get();
    }

    protected function getLegislacoesPorTipo(int $tipo)
    {
        return Legislacao::selectRaw('sitefox_legislacao_tipo.nome, sitefox_legislacao_tipo.id, count(sitefox_legislacao_tipo.id) as count')
        ->join('sitefox_legislacao_tipo', 'sitefox_legislacao.id_tipo', 'sitefox_legislacao_tipo.id')
        ->groupBy('sitefox_legislacao_tipo.nome')
        ->groupBy('sitefox_legislacao_tipo.id')
        ->where('sitefox_legislacao.ativo', 1)
        ->where('sitefox_legislacao_tipo.tipo', $tipo)
        ->get();
    }
}
