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