<?php

namespace App\Http\Controllers;

use App\Lista;
use App\Filme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FilmeListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $filmes = Filme::all();
        $listas = DB::table('listas')
                ->where('usuario_id', '=', $user->id)
                ->get();

        return view('listas.addlista', compact('listas'),  compact('filmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $lista = Lista::findOrFail($request->lista_id);
        
        try{

            $lista->filmes()->attach($request->filme_id);
             return redirect('listas/'.$request->lista_id);

        }catch(\Illuminate\Database\QueryException $e){
            return redirect('listas/'.$request->lista_id);
        }

       
    }

    public function deletefilme(Lista $lista, Request $request)
    {
        DB::table('filme_lista')
            ->where('filme_id', $request->filme_id)
            ->where('lista_id', $request->lista_id)
            ->delete();
        return redirect('listas/'.$request->lista_id);
    } 

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
