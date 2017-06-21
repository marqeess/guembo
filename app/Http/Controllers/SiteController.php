<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slide;
use App\Filme;
use App\Lista;
use App\User;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $filmes = Filme::all();
        return view('welcome', compact('slides','filmes'));
    }
    public function filmes()
    {
        $filmes = Filme::all();
        return view('filmes', compact('filmes'));
    }
     public function pesquisar(Request $request)
    {
         $filmes = DB::table('filmes')
                ->where('titulo', 'like', '%'.$request->pesquisar.'%')
                ->get();
        return view('pesquisarfilme', compact('filmes'));
    }
    public function filmeunico(Filme $filme)
    {
        $user = Auth::user();
        $listas = DB::table('listas')
                ->where('usuario_id', '=', $user->id)
                ->get();
        $comentarios = DB::table('comentarios')
                ->where('filme_id', '=', $filme->id)
                ->get();

        $usuarios = User::all();
                
    return view('unicofilme', compact('filme','listas','comentarios','usuarios')); 
    }
}
