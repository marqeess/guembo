@extends('layouts.padrao')

@section('content')

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

@endsection