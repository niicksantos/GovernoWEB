<!----- PARLAMENTARES ----->
<div class="row">
    <div class="col-12">
        <div class="parlamentares_titulo">
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
                        <p id="legis_atual">Presidente da Câmara:</p>
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

        <div class="div_vereadores">
            <div class="box_vereadores">
                <div class="col-12 display_vereador">
                    @foreach ($parlamentares as $parlamentar) 
                        <div class="col-3 vereadores">
                                <img src="{{$parlamentar->imagem}}" alt="{{$parlamentar->nome}}">     
                                <div class="texto_vereadores">
                                    {{$parlamentar->nome}} <br>
                                    {{$parlamentar->partido}} 
                                </div>   
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>