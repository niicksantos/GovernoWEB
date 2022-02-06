<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/msg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estrutura.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estrutura_interna.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estrutura_interna_mobile.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    @yield('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
   
    <title>@yield('titulo', 'Prefeitura Municipal de ***')</title>
</head>

<body>
    <div>
        <header>
            <!-- FORMULÁRIO DE LOGIN E CADASTRO -->
            <div class="sw_popup_modal" id="itn_login">
                <div class="sw_popup">
                    <div class="sw_btn_fechar_popup"><span class="swfa fas fa-times" aria-hidden="true"></span></div>
                    <!-- LOGIN -->
                    <div class="itn_area_form_login">
                        <div class="sw_titulo_popup sw_lato_bold">
                            <span>LOGIN</span>
                            <a href="https://www.camaradepenapolis.sp.gov.br/portal/internautas/cadastrar/pf">
                                <div class="itn_btn_cadastro sw_lato_medium"><span>Cadastre-se</span><span class="swfa fas fa-user-plus" aria-hidden="true"></span></div>
                            </a>
                        </div>
                        <div class="sw_descricao_popup sw_lato">Informe seus dados para acessar</div>

                        <form action="https://www.camaradepenapolis.sp.gov.br/portal/internautas/login" id="form_login" method="post" autocomplete="off">
                            <div class="itn_area_campos_login">
                                <label for="cpf_cnpj_email" class="sw_lato_bold">CPF, CNPJ ou e-mail</label>
                                <input type="text" id="cpf_cnpj_email" name="cpf_cnpj_email" class="sw_lato" autocomplete="off" required>
                            </div>

                            <div class="itn_area_campos_login">
                                <label for="senha" class="sw_lato_bold">Senha</label>
                                <input type="password" id="senha" name="senha" class="sw_lato" autocomplete="off" required>
                            </div>

                            <div class="itn_area_campos_login itn_recuperar_login_senha sw_lato_bold">Esqueci minha <span id="link_senha" class="sw_lato_bold">senha</span></div>

                            <div class="itn_area_campos_login itn_area_campos_login_recaptcha">
                                <div class="g-recaptcha-login" id="captchaLogin"></div>
                            </div>

                            <button type="submit" name="login" value="LOGAR" class="itn_btn_login sw_lato_bold">ENTRAR</button>
                        </form>
                        <button id="entrar_google" class="itn_btn_login_google sw_lato_bold"><img src="/imgcomum/google.svg" alt="google"><span>ENTRAR COM GOOGLE</span></button>

                    </div>

                    <!-- CADASTRAR -->
                    <div class="itn_area_form_cadastro">
                        <div class="sw_titulo_popup sw_lato_bold"><span>CADASTRO</span></div>
                        <div class="sw_descricao_popup sw_lato">Faça seu cadastro gratuitamente</div>

                        <a href="https://www.camaradepenapolis.sp.gov.br/portal/internautas/cadastrar/pj">
                            <div class="itn_btn_pj">
                                <span class="itn_nome_btn sw_lato_bold">Pessoa Jurídica</span>
                                <span class="itn_descricao_btn sw_lato_italic">Clique para se cadastrar</span>
                            </div>
                        </a>

                        <a href="https://www.camaradepenapolis.sp.gov.br/portal/internautas/cadastrar/pf">
                            <div class="itn_btn_pf">
                                <span class="itn_nome_btn sw_lato_bold">Pessoa Física</span>
                                <span class="itn_descricao_btn sw_lato_italic">Clique para se cadastrar</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div><!-- CABEÇALHO -->
            <div id="e_cont_topo">
                <!-- ATALHOS LATERAIS -->
                <div class="e_area_atalhos_laterais tamanho_fixo">

                    <!-- BOTÕES -->
                    <a href="/portal/sic">
                        <div class="e_cont_btn_atalho" id="e_cont_btn_sic">
                            <div class="e_titulo_btn_atalho"><span class="e_over_xb">e-SIC</span></div>
                            <div class="e_img_btn_atalho"><img src="/img/sic_lateral.png" alt="e-SIC"></div>
                        </div>
                    </a>
                    <a href="/portal/diario-oficial">
                        <div class="e_cont_btn_atalho" id="e_cont_btn_diario">
                            <div class="e_titulo_btn_atalho"><span class="e_over_xb">DIÁRIO OFICIAL</span></div>
                            <div class="e_img_btn_atalho"><img src="/img/diario_lateral.png" alt="Diário oficial"></div>
                        </div>
                    </a>
                    <a href="/portal/transparencia">
                        <div class="e_cont_btn_atalho" id="e_cont_btn_transparencia">
                            <div class="e_titulo_btn_atalho"><span class="e_over_xb">TRANSPARÊNCIA</span></div>
                            <div class="e_img_btn_atalho"><img src="/img/transpa_lateral.png" alt="Transparência"></div>
                        </div>
                    </a>
                    <a href="https://www.camaradepenapolis.sp.gov.br/webmail" target="_blank">
                        <div class="e_cont_btn_atalho" id="e_cont_btn_webmail">
                            <div class="e_titulo_btn_atalho"><span class="e_over_xb">VLIBRAS</span></div>
                            <div class="e_img_btn_atalho"><img src="/img/libras_lateral.png" alt="Libras"></div>
                        </div>
                    </a>
                </div>
                <!-- FIM ATALHOS LATERAIS -->

                <!-- Barra do topo -->
                <div class="e_barra_topo">
                    <div class="e_cont_barra_topo">
                    
                        <!-- ACESSIBILIDADE -->
                        <div class="e_area_acessibilidade">
                            <span class="e_titulo_acessibilidade e_open_r">Acessibilidade</span>
                            <div class="e_cont_acessibilidade">
                                <a accesskey="6" href="/portal/acessibilidade" title="Ir para acessibilidade">
                                    <div class="e_btn_acessibilidade"><span class="fa fa-wheelchair" aria-hidden="true"></span><span class="e_trans">acessibilidade</span></div>
                                </a>
                                <a id="contraste" accesskey="5">
                                    <div class="e_btn_acessibilidade" title="Contraste"><span class="fa fa-adjust" aria-hidden="true"></span><span class="e_trans">contraste</span></div>
                                </a>
                                <a href="/portal/mapa">
                                    <div class="e_btn_acessibilidade" title="Mapa do site"><span class="fa fa-sitemap" aria-hidden="true"></span><span class="e_trans">mapa</span></div>
                                </a>
                                <a class="diminuir">
                                    <div class="e_btn_acessibilidade" title="Diminuir fonte"><span class="fa fa-minus" aria-hidden="true"></span><span class="e_trans">diminuir</span></div>
                                </a>
                                <a class="aumentar">
                                    <div class="e_btn_acessibilidade" title="Aumentar fonte"><span class="fa fa-plus" aria-hidden="true"></span><span class="e_trans">aumentar</span></div>
                                </a>
                                <a id="linkConteudo" href="#e_conteudo" accesskey="1" class="e_trans">Ir para o conteúdo</a>
                                <a href="#e_cont_topo" accesskey="2" class="e_trans">Ir para o menu</a>
                                <a id="irbusca" accesskey="3" class="e_trans">Ir para a busca</a>
                                <a href="#e_cont_rodape" accesskey="4" class="e_trans">Ir para o rodapé</a>
                            </div>
                        </div>

                        <!-- REDES SOCIAIS -->
                                        <div class="e_area_redes_sociais">
                                <span class="e_titulo_redes_sociais e_open_r">Siga nossos canais</span>
                                <div class="e_cont_redes_sociais">
                                                                <a href="https://www.instagram.com/camaramunicipaldepenapolis/" target="_blank">
                                        <div class="e_img_rede_social"><img src="/img/instagram.jpg" width="30" height="30" alt="Instagram"></div>
                                        </a>
                                                                <a href="https://www.facebook.com/camarapenapolis/?fref=ts" target="_blank">
                                        <div class="e_img_rede_social"><img src="/img/facebook.jpg" width="30" height="30" alt="Facebook"></div>
                                        </a>
                                                                    
                                </div>
                            </div>
                        
                        <!-- BUSCA -->
                        <div class="e_area_busca">
                            <form action="/portal/busca" method="post" id="formulario_busca">
                                <label for="e_campo_busca" class="e_trans">Busca</label>
                                <input type="text" id="e_campo_busca" name="form_busca" class="e_campo_busca e_open_li" placeholder="Buscar">
                                <button type="submit" class="e_btn_busca"><span class="fa fa-search" aria-hidden="true"></span></button>
                            </form>
                        </div>
                        <!-- FIM BUSCA -->
                    </div>        
                </div>

                <!-- CONTEÚDO CABEÇALHO -->
                <div id="e_banner_topo_dinamico" class="e_conteudo_interno">
                
                    <!-- LINK BRASÃO TOPO -->
                        <div id="e_banner_topo_dinamico_clique">      
                            <a href="/">      
                                <div id="logo_branca" class="img_contraste">
        
                                    <img src="/img/logo.png" alt="Logo" style="max-width:250px; max-height:90px;">
                                </div>
                            </a>
                        </div>
                                   
                    <!-- BOX CABEÇALHO -->
                    <div class="e_box_cabecalho">

                        <!-- SIC -->
                        <a href="/portal/sic">
                            <div class="e_area_sic">
                                <div class="e_img_sic"><img src="/img/icone_sic.png" alt="Acesso à Informação"></div>
                                <div class="e_text_sic e_over_r">Acesso à<br>INFORMAÇÃO</div>
                            </div>
                        </a>
                        <!-- Portal Transparência -->
                        <a href="/portal/transparencia" target="_blank">
                            <div class="e_area_transparencia">
                                <div class="e_img_transparencia"><img src="/img/icone_transpa.png" alt="Portal da Transparência"></div>
                                <div class="e_text_transparencia e_over_r">Portal da<br>TRANSPARÊNCIA</div>
                            </div>
                        </a>

                        <!-- SESSÃO LEGISLATIVA -->
                        
                        <a href="/portal/sessaoplenaria/0/466">
                            <div id="e_cont_sessao" class="e_cont_sessao">
                                <div class="e_icone_sessao"><span class="fa fa-university"></span></div>
                                <div class="e_area_texto_sessao">
                                    <span class="e_titulo_sessao e_over_r">Consulte</span>
                                    <span class="e_data_sessao e_over_l">SESSÃO PLENÁRIA</span>
                                </div>
                            </div>
                        </a>

                                    <!-- FIM PRÓXIMA SESSÃO -->

                    </div>
                </div>
                <!-- FIM CONTEÚDO CABEÇALHO --> 
                
                <!-- MENU PRINCIPAL -->
                <div class="e_menu_principal" id="e_menu_principal">
                    <ul>  
                        
                        <li>
                            <a href="/portal" target="_self" >
                                <div class="e_link_menu_p">
                                    <span class="e_over_sb">Institucional</span>
                                </div>
                            </a>
                            <div class="e_submenu_p">
                                <ul> 
                                    <li><a href="https://www.camaradepenapolis.sp.gov.br/portal/comissoes" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Comissões</span></div></a></li>
                                    <li><a href="/portal/servicos/33/controle-interno/" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Controle Interno</span></div></a></li>                                 
                                    <li><a href="/portal/presidentes" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Galeria dos Presidentes</span></div></a></li>
                                    <li><a href="/portal/servicos/40/hino-municipal/" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Hino Municipal</span></div></a></li>              
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="https://www.camaradepenapolis.sp.gov.br/portal/editais/0/3/15/" target="_self" >
                                <div class="e_link_menu_p">
                                    <span class="e_over_sb">Edital Estagiários</span>
                                </div>
                            </a>      
                        </li>

                        <li>
                            <a href="#" target="_self" >
                                <div class="e_link_menu_p">
                                    <span class="e_over_sb">PROPOSIÇÕES</span>
                                </div>
                            </a>      
                        </li>

                        <li>
                            <a href="#" target="_self" >
                                <div class="e_link_menu_p">
                                    <span class="e_over_sb">COMISSÕES</span>
                                </div>
                            </a>      
                        </li>
                                    
                        <li>
                            <a href="/portal/leis_decretos" target="_self" >
                                <div class="e_link_menu_p">
                                    <span class="e_over_sb">Legislação</span>
                                </div>
                            </a>
            
                            <div class="e_submenu_p">
                                <ul>
                                    <li><a href="/portal/servicos/51/constituicao-estadual/" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Constituição Estadual</span></div></a></li>

                                    <li><a href="http://www.planalto.gov.br/ccivil_03/constituicao/constituicao.htm" target="_blank" rel="noreferrer"><div class="e_link_submenu_p"><span class="e_over_r">Constituição Federal</span></div></a></li>
                                    
                                    <li><a href="/portal/leis_decretos/1/0/0/0/7/0/0/0/0" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Decretos Legislativos</span></div></a></li>
                                    
                                    <li><a href="/portal/servicos/53/lei-organica-do-municipio/" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Lei Orgânica do Município</span></div></a></li>
                                   
                                    <li><a href="/portal/leis_decretos/1/0/0/0/2/0/0/0/0" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Leis Complementares</span></div></a></li>

                                    <li><a href="/portal/leis_decretos/1/0/0/0/1/0/0/0/0" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Leis Ordinárias</span></div></a></li>

                                    <li><a href="/portal/leis_decretos/1/0/0/0/5/0/0/0/0" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Regimento  Interno</span></div></a></li>

                                    <li><a href="/portal/leis_decretos/1/0/0/0/6/0/0/0/0" target="_self" ><div class="e_link_submenu_p"><span class="e_over_r">Resoluções</span></div></a></li>          
                                </ul>
                            </div>
                        </li>
          
                        <li>
                            <a href="/portal/vereadores" target="_self" >
                                <div class="e_link_menu_p">
                                    <span class="e_over_sb">Vereadores</span>
                                </div>
                            </a>
                        </li>

                                    
                        <li> 
                            <a href="/portal/sessaoplenaria" target="_self" >
                                <div class="e_link_menu_p">
                                    <span class="e_over_sb">Sessão Plenária</span>
                                </div>
                            </a>
                        </li>

                                
                        <!-- MENU TODOS -->
                        <li class="e_li_menu_p">
                            <div class="e_icone_menu_p" id="e_icone_menu_p"><span class="fa fa-bars"></span></div>
                            <div class="e_menu_todos">
                                <div class="e_cont_menu_todos">
                                    <div class="e_cont_barra_menu_todos">
                                        <ul>
                                            <!-- MENU SERVIÇOS -->
                                            <li><div class="e_cabecalho_menu"><span class="fa fa-bars" aria-hidden="true"></span><span class="e_over_b">Serviços</span></div></li>

                                            <li>
                                                <a href="/portal/proposicoes" target="_self" >
                                                    <div class="e_link_menu_todos e_titulo_subitem"><span class="e_over_r">Processo</span></div>
                                                </a> 
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/servicos/42/certidoes/" target="_self" >
                                                    <div class="e_link_menu_todos e_subitem_menu  e_over_r">
                                                        <span>Certidões</span>
                                                    </div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/proposicoes/1/3/0/0/0/0/0/0/0/0/0/0/" target="_self" >
                                                    <div class="e_link_menu_todos e_subitem_menu  e_over_r">
                                                        <span>Indicações</span>
                                                    </div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/proposicoes/1/4/0/0/0/0/0/0/0/0/0/0/" target="_self" >
                                                    <div class="e_link_menu_todos e_subitem_menu  e_over_r">
                                                        <span>Moções</span>
                                                    </div>
                                                </a>
                                            </li>
                                          
                                            <li>
                                                <a href="/portal/proposicoes/1/2/0/0/0/0/0/0/0/0/0/0/" target="_self" >
                                                    <div class="e_link_menu_todos e_subitem_menu e_ultimo_subitem e_over_r">
                                                        <span>Requerimentos</span>
                                                    </div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/audiencias-publicas" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Audiências</span></div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/editais/1" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Licitações</span></div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/editais/3" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Editais</span></div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/contratos" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Contratos</span></div>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="http://demonstrativo.camarapenapolis.infocin.com.br/" target="_blank" rel="noreferrer">
                                                    <div class="e_link_menu_todos e_over_r"><span class="fa fa-dollar" aria-hidden="true"></span><span class="e_over_r">Holerite Online</span></div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <div class="e_link_menu_todos e_titulo_subitem"><span class="e_over_r">A Nossa Cidade</span></div>
                                            </li>
                                          
                                            <li>
                                                <a href="/portal/servicos/1001/historia-da-camara/" target="_self" >
                                                    <div class="e_link_menu_todos e_subitem_menu  e_over_r">
                                                        <span>História da Câmara</span>
                                                    </div>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="https://www.memorialdosmunicipios.com.br/penapolis" target="_self" >
                                                    <div class="e_link_menu_todos e_subitem_menu  e_over_r">
                                                        <span class="fa fa-history" aria-hidden="true"></span><span>Memorial de Penápolis</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/turismo/9" target="_self" >
                                                    <div class="e_link_menu_todos e_subitem_menu e_ultimo_subitem e_over_r">
                                                        <span>Turismo</span>
                                                    </div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/galeria-de-fotos/" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Galeria de Fotos</span></div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/servicos/1003/pareceres/" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Pareceres</span></div>
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="/portal/mesa-diretora" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Mesa Diretora</span></div>
                                                </a>
                                            </li>
                                    
                                            <li>
                                                <a href="/portal/legislaturas" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Legislaturas</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/proposicoes" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Proposições</span></div>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="/portal/contratos" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Contratos</span></div>
                                                </a>  
                                            </li>
                                            
                                            <li>
                                                <a href="/portal/ouvidoria" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Ouvidoria</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/comissoes" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Comissões</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/galeria-de-videos/" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Galeria de Vídeos</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/secretarias/" target="_self" >
                                                    <div class="e_link_menu_todos e_titulo_subitem"><span class="e_over_r">Secretarias</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/contas_publicas/" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Contas Públicas</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/leis_decretos/" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Legislação</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <div class="e_link_menu_todos e_titulo_subitem"><span class="e_over_r">Editais</span></div>
                                            </li>

                                            <li>
                                                <a href="/portal/editais/1" target="_self" >
                                                    <div class="e_link_menu_todos e_subitem_menu  e_over_r">
                                                        <span>Licitações</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/editais/3" target="_self" >
                                                    <div class="e_link_menu_todos e_subitem_menu e_ultimo_subitem e_over_r">
                                                        <span>Concursos e Processos Seletivos</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/links/" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Links</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/transparencia" target="_blank" rel="noreferrer">
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Transparência</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/sic" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Sic</span></div>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="/portal/noticias/3" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Notícias</span></div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="/portal/contato" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">Contato</span></div>
                                                </a> 
                                            </li>

                                            <li>
                                                <a href="/portal/servicos/1007/historia-da-camara/" target="_self" >
                                                    <div class="e_link_menu_todos e_over_r"><span class="e_over_r">História da Câmara</span></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>    
                        <!-- FIM MENU TODOS --> 
                    </ul>
                </div>
            </div>  
        </header>
    </div>
    <div>
        <section>
            @yield('content')
        </section>
        
        <!-- <footer class="footer fixed-bottom bg-dark">
            <div class="card-footer text-white">
                Rodapé
            </div>
        </footer> -->
    </div>    

    <script>
        
      
    </script>

</body>
</html>
