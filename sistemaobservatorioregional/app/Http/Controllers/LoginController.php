<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dimension;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin_layouts.auth.login');
    }


    public function store(Request $request)
    {
        $remember = $request->has('remember');
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

   
        if (!auth()->attempt(request(['email', 'password'], $remember))) {
            return back()->with('error', 'Credenciales incorrectas');
        }
        
        return view('admin_layouts.index.admin_index');
    }
}