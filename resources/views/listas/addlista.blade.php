<a href="/filmes/create">Cadastrar</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Filmes</th>
            <th>Ações</th>
            
            
            
            
            
            <th></th>

        </tr>
    </thead>

    <tbody>
        @foreach($filmes as $filmes)
        
        <tr>
            <td>{{$filmes->id}}</td>
            <td>{{$filmes->titulo}}</td>
          
           <td>
            
                <form method="POST" action="{{ route('addlista')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="filme_id" value="{{$filmes->id}}">

                    <select name="lista_id" class="form-control">
                                    
                        @foreach($listas as $lista)
                            <option value="{{$lista->id}}">{{$lista->nome}}</option>
                        @endforeach
                    
                
                    </select>

                        <input type="submit" value="Adicionar">
                        </form>

                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
