<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    
     

    public function index()
    {
        return view ('admin.filmes.index');
    }

    public function login()
    {
        return view ('admin.login');
    }

    public function postLogin (Request $request)
    {
        $validator = validator($request->all(),[
            'email' => 'required|min:3|max:100',
            'password' => 'required|min:3|max:100',
        ]);

        if ( $validator->fails()){
            return redirect('admin/login')
            ->withErrors($validator)
            ->withInput();
        }

        $credentials = ['email' => $request->get('email') , 'password' => $request->get('password')];

        if ( auth()->guard('admin')->attempt($credentials) ) {
            return redirect('/filmes');
        } else {
            return redirect('/admin/login');
            
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }

}
