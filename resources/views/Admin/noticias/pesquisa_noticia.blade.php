@extends('layouts.admin.admin_layout')

@section('titulo', 'Pesquisar Notícia')


@section('content')

    <h5 class="card-header">Pesquisar Notícias</h5>
    <div class="card-body bg-white">
        <form action="{{route('admin.noticias.cadastra_noticia')}}" class="form-control" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row md-12">
                <div class="card-body bg-white">       
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="resultados" class="form-label">Resultados por Página</label>
                            <select  id="resultados" name="resultados" class="form-select" aria-label="">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
        
                        </div>
                        <div class="form-group col-md-2">
                            <label for="pesquisar" class="form-label">Pesquisar</label>
                            <input type="text" name="pesquisar" class="form-control" id="titulo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="cat_noticia" class="form-label">Categoria</label>
                            <select  id="cat_noticia" name="cat_noticia" class="form-select" aria-label="">
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="exibir_noticia" class="form-label">Exibir</label>
                            <select  id="exibir_noticia" name="exibir_noticia" class="form-select" aria-label="">
                            </select>
                        </div>  
                    </div>
                </div>
            </div>
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
        </form>
    </div>

<script>

$(document).ready( function () {
    $('#tab_noticias').DataTable();
} );


</script>


    
@endsection