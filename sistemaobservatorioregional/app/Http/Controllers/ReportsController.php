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
            'dimensions' => $dimensionModel->getAllDimension(), 
            'variables' => $variableModel = Variable::where('variable_dimension_id', 1)->get()
        
        ];
        return view('admin_layouts.reports.create',$data);
    }

    public function getVariablesByDimension(Request $request, $dimension_id)
    {
        dd($dimension_id);
        $variables = Variable::where('dimension_id', $dimension_id)->get();

        $options = [];
        foreach ($variables as $variable) {
            $options[] = [
                'id' => $variable->id,
                'name' => $variable->name
            ];
        }

        return response()->json(['options' => $options]);
    }

}
