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
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']); 
        $data = [          
            'dimensions' => $dimensionModel->getAllDimension(), 
        ];
        return view('admin_layouts.reports.dimension',$data);
    }

    public function venReporteVar(Request $request){
        $variableModel = new Variable(); 
        $dimensionID = $request->input('variable_dimension_id'); 
        $variableModel = $variableModel->makeVisible(['variable_id']);  
        $data = [          
            'variables' => $variableModel->getVariableByDimensionId($dimensionID),
            'dimensionID' => $dimensionID
        ];
        return view('admin_layouts.reports.variable',$data);
    }

    public function venReporteSubVar(Request $request){
        $subVariableModel = new Sub_Variable(); 
        $dimensionID = $request->input('variable_dimension_id'); 
        $variableId = $request->input('Variable_Variable_id');
        $subVariableModel = $subVariableModel->makeVisible(['variable_id']);  
        $data = [          
            'subVariables' => $subVariableModel->getSubVariableByVariableId($variableId),
            'dimensionID' => $dimensionID
        ];
        return view('admin_layouts.reports.subVariable',$data);
    }

}
