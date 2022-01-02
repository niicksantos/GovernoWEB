@extends('layouts.site_layout')



@section('content')
    @foreach ($noticia as $not)
        <div class="row">
            <div class="col-4"></div>

            <div class="col-4">
                <h2>{!!$not->titulo!!}</h2>
            </div>
            
            <div class="col-4"></div>
        </div>

        <div class="row">
            
            
                <div class="col-6">
                    {!! $not->texto !!}
                </div>

                <div class="col-6">
                    <img src="../{{$not->capa}}" class="d-block w-100" alt="...">
                </div>

        </div>
    @endforeach
    
@endsection