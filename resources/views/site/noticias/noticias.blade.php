@extends('layouts.site_layout')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-12 pagina_noticias">
            @foreach ($noticias as $not)
                <div class="col-3 noticias">
                    <a href="{{ route('noticias.noticia', ['id' => $not->id])}}" >
                        <div>
                            <img class="img_noticias" src="{{$not->capa}}" alt="{{$not->titulo}}">
                        </div>
                        <div class="titulo_noticias">
                            {{$not->titulo}}
                        </div>
                    </a>    
                </div>
            @endforeach
            
        </div>
    </div>
    {{$noticias->links() }}
</div>


@endsection