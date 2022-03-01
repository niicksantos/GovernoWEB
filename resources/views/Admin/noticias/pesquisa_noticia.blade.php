@extends('layouts.admin.admin_layout')

@section('titulo', 'Pesquisar Notícia')

<link href="{{ asset('css/admin/noticias.css') }}" rel="stylesheet">


@section('content')

    <h5 class="card-header">Pesquisar Notícias</h5>
    <div class="card-body bg-white">
        
                    <table class="table table-hover" id="noticias">
                        <thead class="table-primary">
                          <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Data</th>
                            <th scope="col">Título</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Secretaria</th>
                            <th scope="col">Exibir</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($noticias as $noticia)
                                <tr>
                                    <td class="col-1">{{$noticia->id}}</td>
                                    <td class="col-1">{{$noticia->data}}</td>
                                    <td class="col-3">{{$noticia->titulo}}</td>
                                    <td class="col-1">{{$noticia->id_categoria}}</td>
                                    <td class="col-2">{{$noticia->titulo}}</td>
                                    <td class="col-1"> @if( $noticia->exibir == 1)Sim @else Não @endif  </td>
                                    <td class="col-2"> <a href="{{route('edita_noticia', ['id' => $noticia->id])}}"><img src="@if( $noticia->exibir == 1)../img/check.png @else ../img/close.png @endif" class="img-btn" title="@if( $noticia->exibir == 1)Exibir @else Não exibir @endif" alt="Exibir"></a> 
                                                        <a href="{{route('edita_noticia', ['id' => $noticia->id])}}"><img src="../img/destaqueon.png" class="img-btn" title="Destaque" alt="Destaque"></a> 
                                                        <a href="{{route('edita_noticia', ['id' => $noticia->id])}}"><img src="../img/edit.png" class="img-btn" title="Editar" alt="Editar"></a> 
                                                        <a href="{{route('deleta_noticia', ['id' => $noticia->id])}}" onclick="return confirm('Tem certeza que deseja exclui esta notícia?')"><img src="../img/delete.png" class="img-btn" title="Excluir" alt="Excluir"></a>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                      </table>
                </div>
                
            </div>
    </div>

<script>

$(document).ready( function () {
    $('#noticias').DataTable({
        'order': [0, 'desc'],
        'language': {
            processing:     "Traitement en cours...",
            search:         "Pesquisar:",
            lengthMenu:    "Mostrar _MENU_ Entradas",
            info:           "Exibindo entradas _START_ &agrave; _END_ de um total de _TOTAL_ entradas",
            loadingRecords: "Carregando...",
            zeroRecords:    "Nenhuma entrada para exibir.",
            emptyTable:     "Não há dados disponíveis na tabela.",
            paginate: {
            first:      "Primeira",
            previous:   "Anterior",
            next:       "Próxima",
            last:       "Última"
            }
        }
    });
} );


</script>


    
@endsection