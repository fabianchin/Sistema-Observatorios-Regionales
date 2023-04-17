<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Sub_Variable;
use App\Models\Variable;
use App\Models\Indicator;

use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function index(){
        return view('admin_layouts.reports.create');
    }

    public function genReport(){
        $dimensionModel = new Dimension();
        $variableModel = new Variable();  
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']); 
        $variableModel = $variableModel->makeVisible(['variable_id']); 
        $data = [          
            'dimensions' => $dimensionModel->getAllDimension(), 'variables' => $variableModel->getAllVariables()
           
        ];
        return view('admin_layouts.reports.create',$data);
    }

    public function obtenerVariables(Request $request)
    {
        /*
        $variableModel = new Variable();
        $variableModel = $variableModel->makeVisible(['variable_id']); 
        $data = [          
            'variables' => $variableModel->getVariableTypeById($variable_type_id)
           
        ];
        */
        $variables = Variable::where('variable_dimension_id', $request->dimension_id)->get();
        return response()->json($variables);
    }

    public function loadDropdownData()
    {
        $dimensionModel = new Dimension();
        $variableModel = new Variable();  
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']); 
        $variableModel = $variableModel->makeVisible(['variable_id']); 
        $data = [          
            'dimensions' => $dimensionModel->getAllDimension() 
           
        ];
        $dataVar = [          
            'variables' => $variableModel->getAllVariables()
        ];
        return view('admin_layouts.variable.create', $data, $dataVar);
    }

}
