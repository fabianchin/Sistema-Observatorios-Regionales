<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dimension;
use Termwind\Components\Dd;

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

        $dimensionModel = new Dimension();
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']);
       
        return view('admin_layouts.admin_nav');
    }
}