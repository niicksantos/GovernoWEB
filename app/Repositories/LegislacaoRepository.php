<?php

namespace App\Repositories;

use App\Models\Site\Legislacao;

class LegislacaoRepository
{
    public function getLegislacoesPorTipo(int $tipo)
    {
        return Legislacao::selectRaw('sitefox_legislacao_tipo.nome, sitefox_legislacao_tipo.id, count(sitefox_legislacao_tipo.id) as count')
        ->join('sitefox_legislacao_tipo', 'sitefox_legislacao.id_tipo', 'sitefox_legislacao_tipo.id')
        ->groupBy('sitefox_legislacao_tipo.nome')
        ->groupBy('sitefox_legislacao_tipo.id')
        ->where('sitefox_legislacao.ativo', 1)
        ->where('sitefox_legislacao_tipo.tipo', $tipo)
        ->get();
    }

    public function getLegislacoesPorVereador()
    {
        return Legislacao::selectRaw('sitefox_vereador.id, sitefox_vereador.nome, count(sitefox_vereador.id) as count')
        ->join('sitefox_vereador', 'sitefox_legislacao.id_vereador', 'sitefox_vereador.id')
        ->groupBy('sitefox_vereador.id')
        ->groupBy('sitefox_vereador.nome')
        ->get();
    }

    public function getLegislacoesPorSituacao()
    {
        return Legislacao::selectRaw('sitefox_legislacao_situacao.id, sitefox_legislacao_situacao.nome, count(sitefox_legislacao_situacao.id) as count')
        ->join('sitefox_legislacao_situacao', 'sitefox_legislacao.id_situacao', 'sitefox_legislacao_situacao.id')
        ->groupBy('sitefox_legislacao_situacao.id')
        ->groupBy('sitefox_legislacao_situacao.nome')
        ->get();
    }

    public function get($filtros)
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
}
