<!----- SLIDER ----->

<link href="{{ asset('css/home_slider.css') }}" rel="stylesheet">

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-pause="false" data-bs-ride="carousel">
    <div class="carousel-inner site-carousel">
        @foreach ($slider as $item)
            @if ($contslider == 0)
                <div class="carousel-item active">
                    <img src="{{asset('storage/'.$item->foto)}}" class="d-block w-100" alt="...">
                </div>
                {{ $contslider++}}
            @else 
                <div class="carousel-item">
                    <img src="{{asset('storage/'.$item->foto)}}" class="d-block w-100" alt="...">
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
            @foreach ($msg_alerta as $msg)
                <p>{{$msg->msg_1}}</p>                
            @endforeach
        </marquee>
    </div>
</div>
