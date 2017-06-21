@extends('layouts.admin2')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Editar Slides
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Editar Slides
                </li>
            </ol>
        </div>
    </div>
     <div class="col-lg-7">
        <form role="form" method="POST" action="{{ route('slides.update', $slides[0]->id) }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" name="nome" value="{{$slides[0]->nome}}">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Imagem</label>
                <input type="file" name="imagem">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>

        </form>
        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
    </div>

@endsection