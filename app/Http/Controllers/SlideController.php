<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
     public function __construct()
    {
       $this->middleware('auth');
    }
   
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
        $request->imagem->move(public_path('admin\slides'), $imagem);
        $slide = new Slide();
        $slide->nome = $request->nome;
        $slide->imagem = $imagem;
        $slide->save();
        return redirect('slides');
    }

    public function edit(Slide $slide)
    {
        $slides = Slide::find($slide);
        return view('admin.slides.edit', compact('slides'));
    }

    public function update(Request $request, Slide $slide)
    {
        $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
        $request->imagem->move(public_path('admin\slides'), $imagem);
        $slide = Slide::find($slide->id);
        $slide->nome = $request->nome;
        $slide->imagem = $imagem;
        $slide->save();
        return redirect('slides');
    }

    public function destroy(Slide $slide)
    {
        $slides = Slide::find($slide->id);
        $slides->delete();
        return redirect('slides');
    }
}
