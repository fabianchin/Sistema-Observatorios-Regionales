<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
