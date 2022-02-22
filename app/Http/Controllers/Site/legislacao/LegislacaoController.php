<?php

namespace App\Http\Controllers\Site\legislacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\LegislacaoRepository; 
class LegislacaoController extends Controller
{
    public function indexLegislacao(Request $request, LegislacaoRepository $legislacaoRepository)
    {
        $especiesNormativas = $legislacaoRepository->getLegislacoesPorTipo(1);
        $legislacoesTema = $legislacaoRepository->getLegislacoesPorTipo(2);
        $legislacoesVereador = $legislacaoRepository->getLegislacoesPorVereador();

        $legislacao['especiesNormativas'] = $especiesNormativas;
        $legislacao['temas'] = $legislacoesTema;
        $legislacao['autores'] = $legislacaoRepository->getLegislacoesPorVereador();
        $legislacao['situacoes'] = $legislacaoRepository->getLegislacoesPorSituacao();
        
        $filtros = $request->only(['palavraChave', 'numero', 'ano', 'especieNormativa', 'tema', 'autor', 'situacao']);

        $legis = $legislacaoRepository->get($filtros);

        return view('site.legislacao.legislacao', [
            'legislacao' => $legislacao,
            'especiesNormativas'=> $especiesNormativas,
            'legislacoesTema' => $legislacoesTema,
            'legislacoesVereador' => $legislacoesVereador,
            'legis' => $legis
        ]);
    }
}
 