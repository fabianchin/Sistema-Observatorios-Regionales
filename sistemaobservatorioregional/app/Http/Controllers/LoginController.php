<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dimension;
use Termwind\Components\Dd;

class LoginController extends Controller
{
    public function index(){
        return view('admin_layouts.auth.login');
    }


    public function store(Request $request){
       
        $this -> validate(request(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

       // me doy por vencido con esto, tengo que revisar porque no  se esta autenticando
        if(!auth()->attempt(request(['email','password']))){
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
        
        $dimensionModel = new Dimension(); 
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']); 
        $data = [          
            'dimensions' => $dimensionModel->getAllDimension()
        ];
        
        return view('admin_layouts.dimension.manage', $data);
        
    }


}
