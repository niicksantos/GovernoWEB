<?php

namespace App\Http\Controllers\Site\legislacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\LegislacaoTipo;
use App\Models\Site\Legislacao;
use App\Models\Site\LegislacaoSituacao;
use App\Models\Site\Parlamentar;


class LegislacaoController extends Controller
{
    public function indexLegislacao(Request $request){

    
        $parlamentares = Parlamentar::where('sitefox_vereador.ativo', 1)
                                            ->where('cargo_mesa_diretora', '<>', 'Presidente')
                                            ->where('id_legislatura', 2)
                                            ->join('sitefox_vereador_legislatura AS svl', 'sitefox_vereador.id', '=', 'svl.id_vereador')
                                            ->join('sitefox_legislatura AS sl', 'sl.id', '=', 'svl.id_legislatura')
                                            ->orderBy('nome')
                                            ->get();

        


        $legislacao['especiesNormativas'] = LegislacaoTipo::where('ativo', true)->where('tipo', 1)->get();
        $legislacao['temas'] = LegislacaoTipo::where('ativo', true)->where('tipo', 2)->get();
        $legislacao['autores'] = $parlamentares;
        $legislacao['situacoes'] = LegislacaoSituacao::orderBy('nome')->where('ativo', 1)->get();

        
        $especiesNormativas = $this->getLegislacoes(1);
        $legislacoesTema = $this->getLegislacoes(2);
        
        $dadosLegis = $request->query();

        //dd($dadosLegis);

        $legis = $this->getLegislacao($dadosLegis['especieNormativa']);

        //dd($legis);


        return view('site.legislacao.legislacao',['legislacao' => $legislacao,
                                                 'especiesNormativas'=> $especiesNormativas,
                                                 'legislacoesTema' => $legislacoesTema,
                                                  'legis' => $legis]);

    }

    protected function getLegislacao(int $id_tipo)
    {
        return Legislacao::selectRaw('sitefox_legislacao.titulo, sitefox_legislacao.data_atualizacao, sitefox_legislacao.id_situacao, sitefox_legislacao.indexacao, sitefox_legislacao.ementa, sitefox_legislacao_situacao.nome, sitefox_vereador.nome AS vereador')
                            ->where('sitefox_legislacao.ativo', 1)
                            ->join('sitefox_legislacao_tipo', 'sitefox_legislacao.id_tipo', '=', 'sitefox_legislacao_tipo.id')
                            ->join('sitefox_legislacao_situacao', 'sitefox_legislacao.id_situacao', '=', 'sitefox_legislacao_situacao.id')
                            ->join('sitefox_vereador', 'sitefox_legislacao.id_vereador', '=', 'sitefox_vereador.id')
                            ->where('sitefox_legislacao.id_tipo', $id_tipo)
                            ->orderBy('sitefox_legislacao.data_atualizacao','desc')
                            ->get();
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
