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
        <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
        </button>
    </div>
</div>


<!----- TEXTO DINAMICO ----->
    <div class="ticker">
        <div class="title">
            <h5>INFORMATIVO</h5>
        </div>
        <div class="news">
            <marquee class="news-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto </p>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam </p>
            </marquee>
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
        <div class="col-12s">
            <div class="acess_rap_btns">
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-3.png') }}" alt=""><p>REQUERIMENTOS</p></div></a>
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-3.png') }}" alt=""><P>PORTARIAS</P></div></a>
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-3.png') }}" alt=""><p>DECRETOS</p></div></a>
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-3.png') }}" alt=""><p>AGENDA DE REUNIÕES</p></div></a>
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-3.png') }}" alt=""><p>CONTAS PÚBLICAS</p></div></a>
                <a href="#"><div class="btn_acrpd"><img src="{{ url('img/icon-3.png') }}" alt=""><p>DÚVIDAS FREQUENTES</p></div></a>
            </div>
        </div>
    </div>
</div>


<!----- NOTICIAS ----->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="noticias_titulo">
                <div class="losango"></div>
                <p>ÚLTIMAS NOTÍCIAS</p>
                <div class="losango"></div>
            </div>
        </div>
    </div>
    <div class="div_noticias">
        <div class="row">
            <div class="col-12">      
                    <div class="row">
                    @foreach ($destaque as $dest)
                        <div class="col-12 noticia_destaque">
                            <a href="{{ route('noticias.noticia', ['id' => $dest->id])}}" ><img class="img_noticia_dest" src="{{ $dest->capa }}" alt="{{ $dest->titulo }}">
                            <!--<p>{!! $dest->titulo !!}</p> -->
                        
                            <div class="texto_noticia">
                                @php
                                    $texto = Str::limit($dest->texto, 600);

                                    if (strlen($texto) > 600)
                                    {
                                        echo $texto.'<br><br><br> <p class="float-right cont_lendo">Continuar Lendo...</p> ';
                                    }
                                     
                                @endphp                                  
                            </a>
                            </div>
                        </div>
                        <div class="calendario_noticia_dest_ano">
                            <div class="calendario_noticia_dest_mes">
                                @php
                                    echo date('d-m', strtotime($dest->data));
                                @endphp 
                            </div>
                            @php
                            echo date('Y', strtotime($dest->data));
                        @endphp
                        </div>
                    @endforeach
                <div class="box_noticias">            
                    @foreach ($noticia as $not)
                        @if ($not->destaque == 0)
                            <div class="row not_linha">
                                <div class="col-3 noticia_padrao">
                                    <a href="{{ route('noticias.noticia', ['id' => $not->id])}}" ><img class="img_noticia" src="{{ $not->capa }}" alt="{{ $not->titulo }}">
                                    <p>{!! $not->titulo !!}</p></a> 
                                </div>
                            </div>                            
                        @endif
                        <div class="calendario_noticia_ano">
                            <div class="calendario_noticia_mes">
                                @php
                                    echo date('d-m', strtotime($not->data));
                                @endphp 
                            </div>
                            @php
                            echo date('Y', strtotime($not->data));
                        @endphp
                        </div>
                    @endforeach  
                </div>
            </div>
        </div>    
    </div>
</div>


<!----- VIDEOS ----->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="noticias_titulo">
                <div class="losango"></div>
                <p>GALERIA DE VÍDEOS</p>
                <div class="losango"></div>
            </div>
        </div>
    </div>
    <div class="div_videos">
        <div class="row">
            <div class="col-12">      
                    <div class="row">
                    @foreach ($videos_d as $video_d)
                        <div class="col-12 video_destaque">
                            <div class="col-6">
                                <iframe width="480" height="270" class ="video_d" src="{{ str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $video_d->youtube) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="titulo_vid_d">
                                    <p>{{ $video_d->titulo }}</p>
                                </div>    
                                </div>
                                <!--<div class="col-6 texto_video">
                                @php
                                    $texto_v = Str::limit($video_d->texto, 600);

                                    if (strlen($texto_v) > 600)
                                    {
                                        echo $texto_v.'<br><br><br> <p class="float-right cont_lendo">Continuar Lendo...</p> ';
                                    } else {
                                        echo $texto_v;
                                    }
                                @endphp
                            </div> -->
                        </div>
                    @endforeach 
                <div class="box_videos">            
                    @foreach ($videos as $video)
                        <div class="col-12 video_padrao">
                            <iframe width="280" height="157" class ="video_p" src="{{ str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $video->youtube) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="titulo_vid">
                                <p>{{ $video->titulo }}</p> 
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>    
    </div>
</div>


<!----- PARLAMENTARES ----->
    <div class="row">
        <div class="col-12">
            <div class="noticias_titulo">
                <div class="losango"></div>
                <p>PARLAMENTARES</p>
                <div class="losango"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="div_parlamentares">
            <div class="div_presidente">
                <div class="row">
                    <div class="col-12">      
                        <div class="row">
                            <div class="losango_presidente_e"></div>
                            <p id="legis_atual">Legislatura Atual:</p>
                            <a href="#" id="legis_anter">Consulte Legislaturas Anteriores: </a>
                            <div class="box_presidente">
                                <div class="col-12 presidente ">
                                    @foreach ($presidente as $presid) 
                                        <img src="{{$presid->imagem}}" alt="{{$presid->nome}}">     
                                        <div class="texto_presidente">
                                            {{$presid->nome}} <br>
                                            {{$presid->partido}} 
                                        </div> 
                                    @endforeach
                                </div>
                            </div>
                          <div class="losango_presidente_d"></div>
                        </div>    
                    </div>
                </div>    
            </div>
        </div>

    </div>


@include('site.home-sessao6')    

@endsection