<!----- SESSAO 6 ----->

<div class="row">
    <div class="col-12">
        <div class="noticias_titulo">
            <div class="losango"></div>
            <p>PRODUÇÃO LEGISLATIVA</p>
            <div class="losango"></div>
        </div>
    </div>
</div>

<div class="row sessao6">       
    <div class="col-md-4">
        <div class="box">
            <div class="box-titulo">Legislação</div>

            <form class="form" method="post" action="{{route('legislacao.legislacao')}}">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search ico-legis" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="palavraChave" placeholder="Palavra chave">
                </div>                 
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control inp-text" name="numero" placeholder="Número" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control inp-text" name="ano" placeholder="Ano" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <select name="especieNormativa" class="form-select">
                                <option selected>Selecione uma espécie normativa</option>
                                @foreach ($legislacao['especiesNormativas'] as $especieNormativa)
                                    <option value="{{$especieNormativa->id}}">{{$especieNormativa->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <select name="tema" class="form-select">
                                <option selected>Selecione um tema</option>
                                @foreach ($legislacao['temas'] as $tema)
                                    <option value="{{$tema->id}}">{{$tema->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <select name="autor" class="form-select">
                                <option selected>Selecione um autor</option>
                                @foreach ($legislacao['autores'] as $autor)
                                    <option value="{{$autor->id}}">{{$autor->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <select name="autor" class="form-select">
                                <option selected>Selecione uma situação</option>
                                @foreach ($legislacao['situacoes'] as $situacao)
                                    <option value="{{$situacao->id}}">{{$situacao->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-primary box-btn">Procurar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box">
            <div class="box-titulo">Espécies Normativas</div>

            <div class="list-group">
                @foreach ($especiesNormativas as $item)
                    <a href="#" class="home-item list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $item->nome }}
                        <span class="badge home-bg-primary rounded-pill">{{ $item->count }}</span>
                    </a>
                @endforeach                
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box">
            <div class="box-titulo">Legislação por Tema</div>

            <div class="list-group">
                @foreach ($legislacoesTema as $item)
                    <a href="#" class="home-item list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $item->nome }}
                        <span class="badge home-bg-primary rounded-pill">{{ $item->count }}</span>
                    </a>
                @endforeach                
            </div>
        </div>
    </div>
</div>