<?php

namespace App\Http\Controllers;

use App\Filme;
use App\Genero;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function index()
    {
        $filmes = Filme::with(['genero'])->get();
        return view('admin.filmes.index', compact('filmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::all();
        return view('admin.filmes.create', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
        $request->imagem->move(public_path('admin\filmes'), $imagem);
        $filme = new Filme();
        $filme->titulo = $request->titulo;
        $filme->trailer = $request->trailer;
        $filme->descricao = $request->descricao;
        $filme->ano = $request->ano;
        $filme->genero_id = $request->genero;
        $filme->imagem = $imagem;
        $filme->save();
        return redirect('filmes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function show(Filme $filme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function edit(Filme $filme)
    {
        $filmes = Filme::find($filme);
        $generos = Genero::all();
        return view('admin.filmes.edit', compact('filmes','generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filme $filme)
    {
        $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
        $request->imagem->move(public_path('admin\filmes'), $imagem);
        $generos = Filme::find($filme->id);
        $filme->titulo = $request->titulo;
        $filme->trailer = $request->trailer;
        $filme->ano = $request->ano;
        $filme->genero_id = $request->genero;
        $filme->imagem = $imagem;
        $filme->save();
        return redirect('filmes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filme $filme)
    {
        $filmes = Filme::find($filme->id);
        $filmes->delete();
        return redirect('filmes');
    }
}
