<!----- SLIDER ----->

<link href="{{ asset('css/home_slider.css') }}" rel="stylesheet">

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
