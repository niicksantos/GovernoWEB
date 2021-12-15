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
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
   
    <title>@yield('titulo', 'Prefeitura Municipal de ***')</title>
</head>

<body>
    <div class="container">
        <header>
            <!--Navbar Topo de Página -->
            <nav class="navbar text-white navbar-site">
                <div class="container">
                    <div class="row ml-auto">
                        <p class="titulo-acess">Acessibilidadeeeesss</p>
                        <div class="ajustes">
                            <a class="btn btn-primary btn-acess" role="button" id="contraste"><i class="fas fa-adjust"></i></a>
                            <a class="btn btn-primary btn-acess" role="button">A+</a>
                            <a class="btn btn-primary btn-acess" role="button">A-</i></a>
                            <a class="btn btn-primary btn-acess" role="button">A=</i></a>
                        </div> 
   
                    </div>
                </div>    
                
            </nav>

            <!-- Header com Menu Principal -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-header">
                <div class="container-fluid ml-auto">
                    
                    <a class="logo-site" href="#"><img src="{{ url('img/logo.png') }}" alt=""></a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


            </nav>
        </header>

        <section>
        @yield('content')
        </section>
        
        <footer class="footer fixed-bottom bg-dark">
            <div class="card-footer text-white">
                Rodapé
            </div>
        </footer>
    </div>

    <script>

      $("#contraste").click(function() {
        var contraste = false;
            
            if(contraste == false){
                $("body")
                    .css("background-color", "black")
                    .css("color", "white");
                    contraste = true;
            } else{
                $("body")
                    .css("background-color", "white")
                    .css("color", "black");
                    contraste = false;
            }
          console.log(contraste);  
      });
      
    </script>


</body>
</html>
