<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Guembo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://127.0.0.1:8000/">Guembo</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="http://127.0.0.1:8000/filmess">Filmes</a>
                    </li>
                    <li>
                        <a href="http://127.0.0.1:8000/listas">Listas</a>
                    </li>
                    
               <form class="navbar-form navbar-left" method="POST" action="{{ route('pesquisar')}}">
                 {{csrf_field()}}
        <div class="form-group">
          <input type="text" class="form-control" name="pesquisar" placeholder="Pesquisar">
        </div>
        <button type="submit" class="btn btn-default "><i class="glyphicon glyphicon-search"></i></button>
      </form>
                    
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Entrar</a></li>
                            <li><a href="{{ route('register') }}">Cadastrar-se</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        
                </ul>
            </div>
            
        </div>
        
    </nav>







     <div class="container">

        
        







         @yield('content')
        
        <!-- /.row -->

        <!-- Features Section -->
       
  

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <center><p>Guembo 2017 &copy; Todos os direitos reservados</p></center>
                </div>
            </div>
        </footer>

    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
