@extends('layouts.admin.admin_layout')

@section('titulo', 'Pesquisar Notícia')


@section('content')

    <h5 class="card-header">Pesquisar Notícias</h5>
    <div class="card-body bg-white">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover" id="tab_noticias">
                    <thead class="table-secondary">
                        <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Data</th>
                        <th scope="col">Título</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Secretaria</th>
                        <th scope="col">Exibir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($noticias as $noticia)
                            <tr>
                                <td>{{$noticia->id}}</td>
                                <td>{{$noticia->data}}</td>
                                <td>{{$noticia->titulo}}</td>
                                <td>{{$noticia->id_categoria}}</td>
                                <td>{{$noticia->titulo}}</td>
                                <td>{{$noticia->exibir}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>      
        </div>
    </div>

<script>

$(document).ready( function () {
    $('#tab_noticias').DataTable();
} );


</script>


    
@endsection