<?php

namespace App\Http\Controllers;

use App\Models\User;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    //proteger esta ruta con auth
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function index()
    {
        return view('admin_layouts.perfil.update_user');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
        ]);
        dd(request()->all());
        if(auth()->attempt($request->only('actualpassword'))){
            $id = Auth::user()->id;
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->updateUser($id, $user->name, $user->email, $user->password);
            
        }else{
            return redirect()->route('perfil.index')->with('error', 'Ha ocurrido un error!');
        }
        
        return redirect()->route('perfil.index')->with('success', 'Usuario modificado con éxito.');
    }
}
