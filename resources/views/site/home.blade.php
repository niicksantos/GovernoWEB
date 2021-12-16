@extends('layouts.site_layout')

@section('content')

<!----- SLIDER ----->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-pause="false" data-bs-ride="carousel">
    <div class="carousel-inner site-carousel">
        @foreach ($slider as $item)
            @if ($contslider == 0)
                <div class="carousel-item active">
                    <img src="{{$item->foto}}" class="d-block w-100" alt="...">
                </div>
                {{ $contslider++}}
            @else
                <div class="carousel-item">
                    <img src="{{$item->foto}}" class="d-block w-100" alt="...">
                </div>
            @endif
        @endforeach        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!----- ACESSO RAPIDO ----->

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="acess-rapido">
                <div class="losango"></div>
                <p>ACESSO RÁPIDO</p>
                <div class="losango"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="acess_rap_btns">
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-1.png') }}" alt=""><p>E-SIC</p></div></a>
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-2.png') }}" alt=""><P>AGENDA DE REUNIÕES</P></div></a>
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-3.png') }}" alt=""><p>TRANSPARÈNCIA</p></div></a>
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-3.png') }}" alt=""><p>CONTAS PUBLICAS/LRF</p></div></a>
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-4.png') }}" alt=""><p>DÚVIDAS FREQUENTES</p></div>                </a>
            </div>
        </div>
    </div>
</div>



@endsection




