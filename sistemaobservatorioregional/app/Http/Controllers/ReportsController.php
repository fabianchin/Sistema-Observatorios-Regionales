<?php
namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Variable;
use App\Models\Sub_Variable;
use App\Models\Indicator;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class ReportsController extends Controller
{

    
    public function genReport()
    {
        $dimensionModel = new Dimension(); 
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']);  
        $data = [          
            'dimensions' => $dimensionModel->getAllDimension(),
        ];
        //dd('Controladora de dimensiones, DD');
        return view('admin_layouts.reports.report', $data);
    }
    
    public function fillVariable(Request $request){
        $variableModel = new Variable();
        $data['variables'] = $variableModel->getVariableByDimensionId($request->dimension_id);
        return response()->json($data);
    }

    public function fillSubVariable(Request $request)
    {
        $subvariableModel = new Sub_Variable();
        $data['subvariables'] = $subvariableModel->getSubVariableByVariableId($request->variable_id);
       // dd($data);
        return response()->json($data);
    }

    public function fillIndicator(Request $request)
    {
        $indicatorModel = new Indicator();
        $data['indicators'] = $indicatorModel->getAllIndicatorsBySubVariableId($request->Subvariable_id);
        //dd($data);
        return response()->json($data);
    }

    public function createReport(Request $request){
        $dimensionId = $request->input('dimension_id');
        $variableId = $request->input('variable_id');
        $subVariableId = $request->input('subvariable_id');
        $indicatorId = $request->input('indicator_id');
        $state = -1;
        $string = "";
        //dd($indicatorId);
        $indicators = new Indicator();
        $subVariables = new Sub_Variable();
        $variables = new Variable();
        $dimensions = new Dimension();
        if($indicatorId != 'none'){
            //$indicators = $indicators->getAllIndicatorsBySubVariableId($subVariableId);
            $state = 0;
        }else if($subVariableId != 'none'){
            $indicators = $indicators->getAllIndicatorsBySubVariableId($subVariableId);
            $subVariables =  $subVariables->getSubVariableById($subVariableId);
            $state = 1;
        }else if($variableId != 'none'){
            $subVariables =  $subVariables->getSubVariableByVariableId($variableId);
            $variables = $variables->getVariableById($variableId);
            $indicators = $indicators->getAllIndicators();
            $dimensions = 'none';
            $state = 2;
        }else{
            $dimensions = $dimensions->getDimensionById($dimensionId);
            $variables = $variables->getVariableByDimensionId($dimensionId);
            $subVariables =  $subVariables->getAllSubVariables();
            $indicators = $indicators->getAllIndicators();
            $state = 3;
        }
        //dd($subVariables);
        return view('admin_layouts.reports.manage', compact('subVariables','indicators','variables','dimensions','state','string'));
    }

}