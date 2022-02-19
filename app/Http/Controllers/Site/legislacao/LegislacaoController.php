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
    public function indexLegislacao(Request $request)
    {
        $legislacao['especiesNormativas'] = $this->getLegislacoesPorTipo(1);
        $legislacao['temas'] = $this->getLegislacoesPorTipo(2);
        $legislacao['autores'] = $this->getLegislacoesPorVereador();
        $legislacao['situacoes'] = $this->getLegislacoesPorSituacao();

        $especiesNormativas = $this->getLegislacoesPorTipo(1);
        $legislacoesTema = $this->getLegislacoesPorTipo(2);
        $legislacoesVereador = $this->getLegislacoesPorVereador();
        
        $filtros = $request->only(['palavraChave', 'numero', 'ano', 'especieNormativa', 'tema', 'autor', 'situacao']);

        $legis = $this->getLegislacoes($filtros);

        return view('site.legislacao.legislacao', [
            'legislacao' => $legislacao,
            'especiesNormativas'=> $especiesNormativas,
            'legislacoesTema' => $legislacoesTema,
            'legislacoesVereador' => $legislacoesVereador,
            'legis' => $legis
        ]);
    }

    protected function getLegislacoes($filtros)
    {
        $query = Legislacao::selectRaw('sitefox_legislacao.*, sitefox_legislacao_situacao.nome, sitefox_vereador.nome vereador')
            ->join('sitefox_legislacao_situacao', 'sitefox_legislacao.id_situacao', 'sitefox_legislacao_situacao.id')
            ->join('sitefox_vereador', 'sitefox_legislacao.id_vereador', 'sitefox_vereador.id')
            ->where('sitefox_legislacao.ativo', 1);
        
        return $this->aplicarFiltros($query, $filtros);
    }

    protected function aplicarFiltros($query, $filtros)
    {
        $query->when(data_get($filtros, 'palavraChave'), function ($query) use ($filtros) {
            $query->where('sitefox_legislacao.ementa', 'like', "%{$filtros['palavraChave']}%");
        });
        $query->when(data_get($filtros, 'numero'), function ($query) use ($filtros) {
            $query->where('sitefox_legislacao.titulo', 'like', "%{$filtros['numero']}%");
        });
        $query->when(data_get($filtros, 'ano'), function ($query) use ($filtros) {
            $query->where('sitefox_legislacao.titulo', 'like', "%{$filtros['ano']}%");
        });
        $query->when(data_get($filtros, 'especieNormativa'), function ($query) use ($filtros) {
            $query->where('sitefox_legislacao.id_tipo', $filtros['especieNormativa']);
        });
        $query->when(data_get($filtros, 'tema'), function ($query) use ($filtros) {
            $query->where('sitefox_legislacao.id_tipo', $filtros['tema']);
        });
        $query->when(data_get($filtros, 'autor'), function ($query) use ($filtros) {
            $query->where('sitefox_legislacao.id_vereador', $filtros['autor']);
        });
        $query->when(data_get($filtros, 'situacao'), function ($query) use ($filtros) {
            $query->where('sitefox_legislacao.id_situacao', $filtros['situacao']);
        });

        return $query->orderBy('sitefox_legislacao.data_atualizacao', 'desc')
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
}
