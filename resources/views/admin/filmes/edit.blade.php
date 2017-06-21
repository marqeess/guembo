@extends('layouts.admin2')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Editar Filmes 
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Editar Filmes 
                </li>
            </ol>
        </div>
    </div>
     <div class="col-lg-7">
        <form role="form" method="POST" action="{{ route('filmes.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" name="titulo" value="{{$filmes[0]->titulo}}">
            </div>
            <div class="form-group">
                <label>Ano</label>
                <input class="form-control" type="number" name="ano" value="{{$filmes[0]->ano}}">
            </div>
            <div class="form-group">
                <label>Trailer</label>
                <input class="form-control" name="trailer" value="{{$filmes[0]->trailer}}">
            </div>
            <select class="form-control" name="genero">
            @foreach($generos as $genero)
                <option value="{{$genero->id}}">{{$genero->nome}}</option>
            @endforeach
            </select>
            <br />
            <div class="form-group">
                <label for="exampleInputFile">Imagem</label>
                <input type="file" name="imagem">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>

        </form>
        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
    </div>

@endsection