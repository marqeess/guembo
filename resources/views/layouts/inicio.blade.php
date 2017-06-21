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
                        <a href="filmess">Filmes</a>
                    </li>
                    <li>
                        <a href="listas">Listas</a>
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
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
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

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        @foreach($slides as $slide)
            <div class="item active">
                <div class="fill" style="background-image:url('admin/slides/{{$slide->imagem}}');"></div>
                <div class="carousel-caption">
                    <h2>{{$slide->nome}}</h2>
                </div>
            </div>
         @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Filmes</h2>
            </div>
             @foreach($filmes as $filme)
            <div class="col-md-4 col-sm-6">
                <a href="http://127.0.0.1:8000/filme/{{$filme->id}}">
                    <img class="img-responsive img-portfolio img-hover" src="admin/filmes/{{$filme->imagem}}" alt="">
                    <h4></h4>{{$filme->titulo}}<h4>
                </a>
            </div>
            @endforeach
        </div>
        <!-- /.row -->

        <!-- Features Section -->
       
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <center><p>Guembo 2017 &copy; Todos os direitos reservados</p></center>
                </div>
            </div>
        </footer>

    </div>
@yield('content')
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
