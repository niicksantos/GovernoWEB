@extends('layouts.site_layout')

<link href="{{ asset('css/noticia.css') }}" rel="stylesheet">

@section('content')
<div class="container">

    @foreach ($noticia as $not)
        <div class="row">
            <div class="col-12 titulo_noticia_unica">
                <p>{!!$not->titulo!!}</p>
            </div>
        </div>
        
            <div class="row">
                <div class="col-6 texto_noticia_unica">
                    {!! $not->texto !!}
                </div>
                <div class="col-6">
                    <img src="../{{$not->capa}}" class="img_noticia_unica" alt="{!!$not->titulo!!}">
                </div>
            </div>
        
    @endforeach

    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('index')}}" role="button">Voltar</a>
        </div>
    </div>
</div>
@endsection