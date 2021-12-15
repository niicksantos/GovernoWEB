@extends('layouts.admin.admin_layout')

@section('titulo', 'Cadastrar Notícia')
    
@section('content')
    
<div class="card-header">Cadastrar Notícia</div>
<div class="card-body bg-white">
    <div class="row md-12">
        <div class="card-body bg-white">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="titulo_noticia" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo_noticia">
                </div>

                <div class="form-group col-md-3">
                    <label for="url_noticia" class="form-label">URL</label>
                    <input type="text" class="form-control" id="url_noticia">
                </div>

                <div class="form-group col-md-2">
                    <label for="data_noticia" class="form-label">Data</label>
                    <input type="text" class="form-control" id="data_noticia">
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="chamada_noticia" class="form-label">Chamada</label>
                    <input type="text" class="form-control" id="chamada_noticia">
                </div>

                <div class="form-check col-md-2" style="margin: 2% 0% 0% 1%;">
                    <input class="form-check-input" type="checkbox" value="" id="exibir_noticia">
                    <label for="exibir_noticia" class="form-label">Exibir?</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-10 form-group">
                    <label>Texto</label>
                    <textarea class="form-control" rows="20" id="texto_noticia"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row md-12">
        <div class="card-body bg-white">

            <div class="row">
                <div class="form-group col-md-2 d-flex justify-content-start align-items-end">
                    <button id="btn-cadastrar" type="button" class="btn btn-success">
                        <i class="fa fa-btn fa-file-pdf-o"></i>
                        Cadastrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        CKEDITOR.replace('texto_noticia');
    });
</script>

@endsection


