@extends('layouts.padrao')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Suas Listas
                <a href="http://127.0.0.1:8000/listas/create" class="btn btn-primary btn-xs">Cadastrar</a>
            </h1>
        </div>
    </div>

     <div class="col-lg-12">
     
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($listas as $lista)
                                    <tr>
                                        <td>{{$lista->id}}</td>
                                        <td>{{$lista->nome}}</td>
                                        <td>
                                        <a href="/listas/{{$lista->id}}/edit" class="btn btn-primary btn-xs">Editar</a>   
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">Apagar</button>
                                            <a href="/listas/{{$lista->id}}" class="btn btn-primary btn-xs">Visualizar</a>   
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Atenção</h4>
                                                    </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja excluir esse lista?
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                         <form style="display: inline;" action="{{route('listas.destroy', $lista->id)}}" method="post">

                                                            {{csrf_field()}}

                                                        <input type="hidden" name="_method" value="delete">
                                                        <button type="submit" class="btn btn-danger">Apagar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection