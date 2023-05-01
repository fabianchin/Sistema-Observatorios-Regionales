<?php
namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Variable;
use App\Models\Sub_Variable;
use App\Models\Indicator;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    
    public function genReport()
    {
        $dimensionModel = new Dimension(); 
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']); 
        $VariableModel = new Variable(); 
        $VariableModel = $VariableModel->makeVisible(['variable_id']); 
        $SubVariableModel = new Sub_Variable(); 
        $SubVariableModel = $SubVariableModel->makeVisible(['sub_variable_id']);
        $IndicatorModel = new Indicator(); 
        $IndicatorModel = $IndicatorModel->makeVisible(['indicator_id']); 
        $data = [          
            'dimensions' => $dimensionModel->getAllDimension(),
            'variables' => $VariableModel->getAllVariables(),
            'subvariables' => $SubVariableModel->getAllSubVariables(),
            'indicators' => $IndicatorModel->getAllIndicators()
        ];
        //dd('Controladora de dimensiones, DD');
        return view('admin_layouts.reports.report', $data);
    }

    
    public function createReport(Request $request){
        $dimensionId = $request->input('sub_variable_dimension_id');
        $variableId = $request->input('sub_variable_variable_id');
        $subVariableId = $request->input('sub_variable_subvariable_id');
        $indicatorId = $request->input('sub_variable_indicator_id');
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