@extends('layouts.site_layout')


@section('content')

<div class="container">
    <div class="row">        
        <div class="col-4">
            <div class="box_licitacao">
                <div class="box-titulo">Busca</div>
                <p>Escolha uma das consultas e acesse esta ferramenta de transparência do Poder Público.</p>
                <form class="form" name="formLegislacao" id="formLegislacao"  action="{{route('legislacao.legislacao')}}">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search ico-legis" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="palavraChave"  id="palavraChave" placeholder="Palavra chave">
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
                                <select name="espNormativa" class="form-select" id="espNormativa">
                                    <option value="0">Selecione uma espécie normativa</option>
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
                                <select name="tema" class="form-select" id="tema">
                                    <option value="0">Selecione um tema</option>
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
                                <select name="autor" class="form-select" id="autor">
                                    <option value="0">Selecione um autor</option>
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
                                <select name="situacao" class="form-select" id="situacao">
                                    <option value="0">Selecione uma situação</option>
                                    @foreach ($legislacao['situacoes'] as $situacao)
                                        <option value="{{$situacao->id}}">{{$situacao->nome}}</option>
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
        </div>
        
        <!--CARDS COM AS LEGISLAÇÕES-->
        <div class="col-8">
            <p>Este Portal disponibiliza o Banco de Dados de Normas Jurídicas do Município. 
               Por meio de consultas rápidas e práticas, o cidadão terá acesso à íntegra de toda a Legislação Municipal vigente.
            </p>

            @foreach ($legis as $leg)

            <div class="card">
                <div class="card-header card_cabecalho">
                  {{$leg->titulo}}
                </div>
                <div class="card-body">
                    <div class="dados_header">
                        <p><b>Data:</b> {{$leg->data_atualizacao}}</p>
                        <p><b>Situação:</b> {{$leg->nome}}</p>
                        <p><b>Tema:</b> {{$leg->indexacao}}</p>
                    </div>
                    <div class="card_texto">
                        <p><b>Assunto:</b> {{ $leg->ementa }}</p>
                    </div>

                </div>
                <div class="card-footer text-muted">
                    <p><b>Autor: {{ $leg->vereador}}</b></p>
                </div>
              </div>
            
                
            @endforeach
            
        </div>
    </div>
</div>

 <script>
     /*
     $(function(){
        $('#formLegislacao').submit(function(event){
            event.preventDefault();

            var palavraChave = $(this).find('#palavraChave').val();
            var especieNormativa = $(this).find('#especieNormativa').val();
            //alert('ok');
        });
        var url = "{{route('legislacao.legislacao')}}";

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url: url,
            type: 'post',
            dataType: "json",   
            data: {
                palavraChave: palavraChave,
                especieNormativa: especieNormativa 
            }
        })

     });

     */
    

 </script>


@endsection
