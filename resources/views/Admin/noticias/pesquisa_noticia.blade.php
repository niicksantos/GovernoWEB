@extends('layouts.admin.admin_layout')

@section('titulo', 'Pesquisar Notícia')


@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Pesquisar Notícias</h5>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="resultados" class="form-label">Resultados por Página</label>
                    <select  id="resultados" name="resultados" class="form-select" aria-label="">
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
</div>



    
@endsection