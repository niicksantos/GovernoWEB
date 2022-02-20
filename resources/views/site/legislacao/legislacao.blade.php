@extends('layouts.site_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="box_licitacao">
                    <div class="box-titulo">Busca</div>
                    <p>Escolha uma das consultas e acesse esta ferramenta de transparência do Poder Público.</p>
                    <form class="form" name="formLegislacao" id="formLegislacao" method="post" action="">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search ico-legis"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="palavraChave" id="palavraChave"
                                placeholder="Palavra chave">
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control inp-text" name="numero" placeholder="Número"
                                        value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control inp-text" name="ano" placeholder="Ano"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <select name="especieNormativa" class="form-select" id="especieNormativa">
                                        <option value="">Selecione uma espécie normativa</option>
                                        @foreach ($legislacao['especiesNormativas'] as $especieNormativa)
                                            <option value="{{ $especieNormativa->id }}">{{ $especieNormativa->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <select name="tema" class="form-select" id="tema">
                                        <option value="">Selecione um tema</option>
                                        @foreach ($legislacao['temas'] as $tema)
                                            <option value="{{ $tema->id }}">{{ $tema->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <select name="autor" class="form-select" id="autor">
                                        <option value="">Selecione um autor</option>
                                        @foreach ($legislacao['autores'] as $autor)
                                            <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <select name="situacao" class="form-select" id="situacao">
                                        <option value="">Selecione uma situação</option>
                                        @foreach ($legislacao['situacoes'] as $situacao)
                                            <option value="{{ $situacao->id }}">{{ $situacao->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary box-btn">Pesquisar</button>
                        </div>
                    </form>
                </div>

                <div class="box">
                    <div class="box-titulo">Espécies Normativas</div>
                    <div class="list-group">
                        @foreach ($especiesNormativas as $item)
                            <a href="{{ route('legislacao.legislacao', ['especieNormativa' => $item->id]) }}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                {{ $item->nome }}
                                <span class="badge home-bg-primary rounded-pill">{{ $item->count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="box">
                    <div class="box-titulo">Legislação por Tema</div>
                    <div class="list-group">
                        @foreach ($legislacoesTema as $item)
                            <a href="{{ route('legislacao.legislacao', ['tema' => $item->id]) }}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                {{ $item->nome }}
                                <span class="badge home-bg-primary rounded-pill">{{ $item->count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="box">
                    <div class="box-titulo">Legislação por Vereador</div>
                    <div class="list-group">
                        @foreach ($legislacoesVereador as $item)
                            <a href="{{ route('legislacao.legislacao', ['autor' => $item->id]) }}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                {{ $item->nome }}
                                <span class="badge home-bg-primary rounded-pill">{{ $item->count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--CARDS COM AS LEGISLAÇÕES-->
            <div class="col-sm-12 col-md">
                <p class="mt-3">
                    Este Portal disponibiliza o Banco de Dados de Normas Jurídicas do Município.
                    Por meio de consultas rápidas e práticas, o cidadão terá acesso à íntegra de toda a Legislação Municipal
                    vigente.
                </p>
                @foreach ($legis as $leg)
                    <div class="card">
                        <div class="card-header card_cabecalho">
                            {{ $leg->titulo }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class=""><b>Data:</b>
                                        {{ $leg->data_atualizacao->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div class="col">
                                    <p class=""><b>Situação:</b> {{ $leg->nome }}</p>
                                </div>
                                <div class="col">
                                    <p class=""><b>Tema:</b> {{ $leg->indexacao }}</p>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <a href={{ url(str_replace(' ', '%20', $leg->arquivo)) }}
                                            class="btn btn-default btn-sm" target="_blank" title="Visualizar">
                                            <i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p><b>Assunto:</b> {{ $leg->ementa }}</p>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <p><b>Autor: {{ $leg->vereador }}</b></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
