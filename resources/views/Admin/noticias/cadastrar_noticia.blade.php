@extends('layouts.admin.admin_layout')

@section('titulo', 'Cadastrar Notícia')
    
@section('content')
     
<div class="card-header">Cadastrar Notícia</div>
<div class="card-body bg-white">
    <form action="{{route('admin.noticias.cadastrar_noticia')}}" class="form-control" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row md-12">
            <div class="card-body bg-white">       
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="data" class="form-label">Data</label>
                        <input type="text" class="form-control" id="data">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="capa" class="form-label">Capa</label>
                        <input type="file" name="capa" class="form-control" id="capa">
                    </div> 

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="chamada" class="form-label">Chamada</label>
                        <input type="text" name="chamada" class="form-control" id="chamada">
                    </div>

                    <div class="form-check col-md-2" style="margin: 2% 0% 0% 1%;">
                        <input class="form-check-input" type="checkbox" value="" id="exibir">
                        <label for="exibir" class="form-label">Exibir?</label>
                    </div>

                    <div class="form-check col-md-2" style="margin: 2% 0% 0% -9%;">
                        <input class="form-check-input" type="checkbox" value="" id="destaque">
                        <label for="destaque" class="form-label">Destaque?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-10 form-group">
                        <label>Texto</label>
                        <textarea class="form-control" rows="20" id="texto"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row md-12">
            <div class="card-body bg-white">

                <div class="row">
                    <div class="form-group col-md-2 d-flex justify-content-start align-items-end">
                        <button type="submit" id="btn-cadastrar" type="button" class="btn btn-success">
                            <i class="fa fa-btn fa-file-pdf-o"></i>
                            Cadastrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {

        /*
        var titulo = $('#titulo').val();

        var url = "{{route('admin.noticias.cadastrar_noticia')}}";

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

        $.ajax({
            
            url: url,
            type: post,
            data:{
                titulo: titulo
            },
            datatype: json

        });

        */
        

        
        CKEDITOR.replace('texto');

    

    });

    $('#data').datepicker();

</script>

@endsection


