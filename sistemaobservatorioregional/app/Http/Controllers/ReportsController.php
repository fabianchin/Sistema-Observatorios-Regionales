<?php
namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Variable;
use App\Models\Sub_Variable;
use App\Models\Indicator;
use App\Models\Region;
use App\Models\Reference;
use App\Models\Indicator_data_cuantitative;
use App\Models\Indicator_data_cualitative;
use App\Models\Year;
use App\Models\List_data;
use Illuminate\Http\Request;
use Termwind\Components\Dd;
use Carbon\Carbon;

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
        $region = new Region();
        $indicator_data_cuantitative = new Indicator_data_cuantitative();
        $indicator_data_cualitative = new Indicator_data_cualitative();
        $list = new List_Data();
        $reference = new Reference();

        if($indicatorId != 'none'){
            $indicators = $indicators->getIndicatorById($indicatorId);
            $region = $region->getRegionbyId($indicators->indicator_region_id);
            $region = !empty($region) ? (object) $region[0] : null;
            $reference = $reference->getAllReferenceByIndicatorId($indicatorId);
            $list = $list->getAllListByIndicatorId($indicatorId);
            if($indicators->indicator_sub_variable_type == 1){
                $indicator_data_cuantitative = $indicator_data_cuantitative->getIndicatorDataCuantitativebyId($indicatorId,$region->region_id);
                $indicator_data_cuantitative = !empty($indicator_data_cuantitative) ? (object) $indicator_data_cuantitative[0] : null;;
            }else{
                $indicator_data_cualitative = $indicator_data_cualitative->getIndicatorDataCualitativebyId($indicatorId);
                $indicator_data_cualitative = !empty($indicator_data_cualitative) ? (object) $indicator_data_cualitative[0] : null;
            }
            //dd($region);
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
        $today = Carbon::now()->format('d/m/Y');
        $header = public_path('assets/img/reports/header.jpg');
        $footer = public_path('assets/img/reports/footer.jpg');
        $pdf = \PDF::LoadView('admin_layouts.reports.manage',compact('subVariables','indicators','variables','dimensions','state','string','indicator_data_cuantitative','indicator_data_cualitative','region','today','header','footer','list','reference'));
        return $pdf->download('Reporte ORHNC '.$today.'.pdf');
    }

    public function dowloadReport(){
        $pdf = \PDF::LoadView('admin_layouts.reports.manage');
    }

}