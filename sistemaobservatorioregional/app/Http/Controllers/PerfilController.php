<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function confirmView(){
        return view('admin_layouts.perfil.confirm_password');
      
    }
    public function confirm(){
        if (!auth()->attempt(request(['email', 'password']))) {
            
            return back()->with('error', 'Contraseña incorrecta');
        }
        return redirect()->route('perfil.index');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
        ]);
        
        $id = Auth::user()->id;
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->updateUser($id, $user->name, $user->email);
        return redirect()->route('perfil.index')->with('success', 'Usuario modificado con éxito.');
    }

    //obtener los usuarios
    public function getAllUsers()
    {
        $userModel = new User(); 
        $userModel = $userModel->makeVisible(['user_id']); 
        $data = [          
            'users' => $userModel->getAllUsers()
        ];
        return view('admin_layouts.users.manage', $data);
    }

    //borrrar usuario
    public function destroy(Request $request)
    {
        $user = new User();
        $state = $user->deleteUser($request->user_id);
        if($state == 1){
            return redirect()->route('perfil.list')->with('status', 'Se elimino correctamente el usuario');
        }else{
            return redirect()->route('perfil.list')->with('error', 'No se pudo eliminar el usuario');
        }
    }


}
