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
        //dd($data);
        return response()->json($data);
    }

    public function fillIndicator(Request $request)
    {
        $indicatorModel = new Indicator();
        $data['indicators'] = $indicatorModel->getAllIndicatorsBySubVariableId($request->subvariable_id);
        //dd($data);
        return response()->json($data);
    }

    public function createReport(Request $request){
        $dimensionId = $request->input('dimension_id');
        $variableId = $request->input('variable_id');
        $subVariableId = $request->input('subvariable_id');
        $indicatorId = $request->input('indicator_id');
        dd($indicatorId);
        if($indicatorId != NULL){
            /*Aqui se va a enviar toda la informacion del indicador para ser mostrada*/ 
        }else if($subVariableId != NULL){
            /*Se envian todos los indicadores del la subvariable*/ 
        }else if($variableId != NULL){
            /*Se envian todas las subvariables y sus respecticos indicadores*/
        }else{
            /*se envian todos las variables y sus respectivas subvariable e indicadores*/
        } 
    }

}