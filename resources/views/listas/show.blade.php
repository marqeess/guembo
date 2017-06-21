@extends('layouts.padrao2')

@section('content')


<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            {{$nome}} 
            </h1>Nota media: {{$notas}}
            <div class="col-lg-7">
             <form method="POST" action="{{ route('addnota')}}">
    {{csrf_field()}}
     <input type="hidden" name="lista_id" value="{{$id}}">
     <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}" >
   Dar nota:<select name="nota" id="nota" class="form-control">
                            
                           
                                <option value="1">1</option>
                                 <option value="2">2</option>
                                  <option value="3">3</option>
                                   <option value="4">4</option>
                                    <option value="5">5</option>

                        </select><input type="submit" value="Enviar">
</form>
        </div>
    </div>
    </div>

@foreach($listas as $lista)
   
   
   
   
    @foreach($filmes as $filme)

        @if ($lista->filme_id == $filme->id)
            <div class="col-md-4 col-sm-6">
                <a href="http://127.0.0.1:8000/filme/{{$filme->id}}">
                    <img class="img-responsive img-portfolio img-hover" src="../admin/filmes/{{$filme->imagem}}" alt="">
                    {{$filme->titulo}}
                    <form method="post" action="{{ route('deletefilme')}}">
                    {{csrf_field()}}
                    
                    <input type="hidden" name="lista_id" value="{{$id}}">
                    <input type="hidden" name="filme_id" value="{{$filme->id}}">
                     <button type="submit" class="btn btn-danger btn-xs">Remover</button>
                    <form>
                </a>
            </div>
           
         @endif


    @endforeach

     

@endforeach


@endsection