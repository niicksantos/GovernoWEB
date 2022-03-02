@extends('layouts.admin.admin_layout')

@section('titulo', 'Editar Notícia')
    
@section('content')
     
<div class="card-header">Cadastrar Notícia</div>
<div class="card-body bg-white">
    <form action="{{route('editar_noticia', ['id' => $noticia->id])}}" class="form-control" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row md-12">
            <div class="card-body bg-white">       
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" value="{{$noticia->titulo}}" class="form-control" id="titulo">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="data" class="form-label">Data</label>
                        <input type="date" value="{{$noticia->data}}" class="form-control" id="data" name="data">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="capa_edit" class="form-label">Capa</label>
                        <input type="file" name="capa_edit" class="form-control" id="capa_edit">
                        <img src="{{asset('storage/'.$noticia->capa)}}" alt="{{$noticia->capa}}">
                    </div> 

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="chamada" class="form-label">Chamada</label>
                        <input type="text" name="chamada" value="{{$noticia->chamada}}" class="form-control" id="chamada">
                    </div>

                    <div class="form-check col-md-2" style="margin: 2% 0% 0% 1%;">
                        <input class="form-check-input" type="checkbox" value="" id="exibir" name="exibir" @if ($noticia->exibir == 1) checked @else  @endif>
                        <label for="exibir" class="form-label">Exibir?</label>
                    </div>

                    @if ($noticia->exibir == 1) Sim @else  @endif

                    <div class="form-check col-md-2" style="margin: 2% 0% 0% -9%;">
                        <input class="form-check-input" type="checkbox" value="" id="destaque" name="destaque" @if ($noticia->destaque == 1) checked @else  @endif>
                        <label for="destaque" class="form-label">Destaque?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-10 form-group">
                        <label for="texto">Texto</label>
                        <textarea class="form-control" rows="20" id="texto" name="texto" >{{$noticia->texto}}</textarea>
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
        
        CKEDITOR.replace('texto');

        var input = $('#capa_edit);
        var file = input.value.split("\\");
        var fileName = file[file.length-1];


        /*
        var titulo = $('#titulo').val();

        var url = "{{route('cadastra_noticia')}}";

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
        
    

    });

   /* $('#data').datepicker({
  dateFormat: "dd-mm-yy"
  */
});

</script>

@endsection


