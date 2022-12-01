<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;
use App\Models\Sub_Variable;
use App\Models\Variable_type;
use App\Models\Dimension;
use App\Models\Variable;
use Termwind\Components\Dd;

class Dynamic_IndicatorController extends Controller{
    public function insertInit(){
        $dimensionModel = new Dimension(); 
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']); 
        $data = [          
            'dimensions' => $dimensionModel->getAllDimension()
        ];
        return view('admin_layouts.dynamic_indicator.insert', $data);
    }

    //Ajax: Seleccion de dimension, llenado de Variable
    public function fillVariable(Request $request)
    {
        $variableModel = new Variable();
        $data['variables'] = $variableModel->getVariableByDimensionId($request->dimension_id);
        return response()->json($data);
    }

    //Ajax: Seleccion de variable, llenado de sub-variable
    public function fillSubVariable(Request $request)
    {
        $subvariableModel = new Sub_Variable();
        $data['subvariables'] = $subvariableModel->getSubVariableByVariableId($request->variable_id);
        //dd($data);
        return response()->json($data);
    }

    //Metodo final que inserta todo
    public function insertDynamicIndicator(Request $request){
        dd($request->all());
    }
}