@extends('layouts.padrao2')

@section('content')

        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <hr>

                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Postado {{$filme->created_at}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="../admin/filmes/{{$filme->imagem}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$filme->titulo}}</p>
                <p>{{$filme->descricao}}</p>
                <p>Ano: {{$filme->ano}}<p>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Trailer
</button>

<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Trailer</h4>
      </div>
      <div class="modal-body">
        <iframe width="865" height="380" src="https://www.youtube.com/embed/{{$filme->trailer}}" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
       
      </div>
    </div>
  </div>
</div>

                <hr>

                 @if (Auth::guest())
                    Faça login

                    @else
                <div class="well">
                    <h4>Deixe seu comentario:</h4>
                    <form method="POST" action="{{ route('addcomentario')}}">
                         {{csrf_field()}}
                        <input type="hidden" name="filme_id" value="{{$filme->id}}">
                        <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comentario"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
@endif
                <hr>

                
 @if (Auth::guest())
                    Faça login

                    @else
                
@foreach($comentarios as $comentario )
   
   
   
   
    @foreach($usuarios as $usuario)

        @if ($comentario ->filme_id == $filme->id)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$usuario->name}}
                        </h4>
                        {{$comentario->comentario}}
                    </div>
                </div>

                     
         @endif


    @endforeach

     

@endforeach

   @endif             

            </div>
<br/><br/><br/><br/><br/>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                <h4>Cadastrar a uma lista</h4>
                 <form method="POST" action="{{ route('addlista')}}">
                 {{csrf_field()}}
                    <input type="hidden" name="filme_id" value="{{$filme->id}}">
 @if (Auth::guest())
                    Faça login

                    @else
                  <select class="form-control" name="lista_id">
                        @foreach($listas as $lista)
                <option value="{{$lista->id}}">{{$lista->nome}}</option>
                         @endforeach
            </select>
            @endif
            <button type="submit" class="btn btn-default">Enviar</button>
            </form>
                </div>

                
                

            </div>

        </div>

        
@endsection