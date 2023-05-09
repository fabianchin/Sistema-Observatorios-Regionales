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
        $variables = array();
        $subVariables = array();
        $indicators = array();
        
        //dd($indicatorId);
        if($indicatorId != NULL){
            $indicators = new Indicator();
            //$indicators = $indicators->getAllIndicatorsBySubVariableId($subVariableId);
            $indicators = $indicators->getAllIndicators();
        }
        if($subVariableId != NULL){
            $subVariables = new Sub_Variable();
            //$subVariables =  $subVariables->getSubVariableByVariableId($variableId);
            $subVariables =  $subVariables->getAllSubVariables();
        }
        if($variableId != NULL){
            $variables = new Variable();
           //$variables = $variables->getVariableByDimensionId($dimensionId);
            $variables = $variables->getAllVariables();
        }
        //dd($subVariables);
        return view('admin_layouts.reports.viewReport', compact('subVariables','indicators','variables'));
    }

}