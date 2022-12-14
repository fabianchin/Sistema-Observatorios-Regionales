<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    
    public function index(){
        return view('admin_layouts.auth.register');
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:60',
            'name' => 'required|max: 30',
            'password' => 'required|confirmed|min:6',
        ]);
        User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password) 
        ]);

        //retornar a la vista de login con mensaje de exito
        return redirect()->route('login')->with('success', 'Usuario creado con exito, inicie sesion');
       
        
    }

}
