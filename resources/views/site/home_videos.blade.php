<!----- VIDEOS ----->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="videos_titulo">
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
                            <div class="col-6 video_dest">
                                <iframe width="480" height="270" class ="video_d" src="{{ str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $video_d->youtube) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="titulo_vid_d">
                                    <p>{{ $video_d->titulo }}</p>
                                </div>    
                            </div>

                            <div class="col-6 texto_video">
                                @php
                                    $texto_v = Str::limit($video_d->texto, 600);

                                   // dd($texto_v);

                                    if (strlen($video_d->texto) > 600)
                                    {
                                        echo $texto_v.'<br> <p class="float-right cont_lendo_v">Continuar Lendo...</p> ';
                                    } else {
                                        echo $texto_v;
                                    }
                                @endphp
                            </div>
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