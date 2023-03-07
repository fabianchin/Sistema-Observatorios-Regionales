<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin_layouts.auth.login');
    }


    public function store(Request $request)
    {
        
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
   
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->with('error', 'Credenciales incorrectas');
        }
        return view('admin_layouts.index.admin_index');
    }
}