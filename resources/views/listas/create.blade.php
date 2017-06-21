@extends('layouts.padrao2')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Cadastrar listas
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Cadastrar Lista
                </li>
            </ol>
        </div>
    </div>
     <div class="col-lg-7">
        <form role="form" method="POST" action="{{ route('listas.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}" >
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" name="nome">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </form>
        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
    </div>

@endsection