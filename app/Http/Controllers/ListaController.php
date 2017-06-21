<?php

namespace App\Http\Controllers;

use App\Filme;
use App\Lista;
use App\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $listas = DB::table('listas')
                ->where('usuario_id', '=', $user->id)
                ->get();
        return view('listas.index', compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listas = new Lista;
        $listas->nome = $request->nome;
        $listas->usuario_id = $request->usuario_id;
        $listas->save();
        return redirect('listas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(Lista $lista)
    {
    $listas = DB::table('filme_lista')
                ->where('lista_id', '=', $lista->id)
                ->get();
     $filmes = Filme::all();
     $listass = Lista::find($lista->id);
     $nome= $listass->nome;
     $id= $listass->id;

     $notas = DB::table('notas')
                ->where('lista_id', '=', $lista->id)
                ->avg('nota');
                
    return view('listas.show', compact('listas','filmes','nome','id','notas')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista $lista)
    {
        $listas = Lista::find($lista);
        return view('listas.edit', compact('listas')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
        $listas = Lista::find($lista->id);
        $listas->nome = $request->nome;
        $listas->save();
        return redirect('listas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista)
    {
        $listas = Lista::find($lista->id);
        $listas->delete();
        return redirect('listas');
    }
}
