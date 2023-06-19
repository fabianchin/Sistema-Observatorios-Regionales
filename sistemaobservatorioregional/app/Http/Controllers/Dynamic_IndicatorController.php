<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Region;
use App\Models\Variable;
use App\Models\Dimension;
use App\Models\Indicator;
use App\Models\Measurement;
use App\Models\Sub_Variable;
use Illuminate\Http\Request;
use App\Models\Variable_type;

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
        
        return response()->json($data);
    }

    public function getAllMeasurementUnit(){
        $measurementUnitModel = new Measurement();
        $data['measurement_units'] = $measurementUnitModel->getAllMeasurementUnit();
       
        return response()->json($data);
    }

    public function getAllyears(){
        $yearModel = new Year();
        $data['years'] = $yearModel->getAllYears();
        
        return response()->json($data);
    }

    public function getAllRegions(){
        $regionModel = new Region();
        $data['regions'] = $regionModel->getAllRegions();
        
        return response()->json($data);
    }

    //Metodo final que inserta todo
    public function insertDynamicIndicator(Request $request){
        dd($request->all());
        $indicatorModel = new Indicator();
        if($request->indicator_sub_variable_type != null && $request->indicator_sub_variable_type != null&& 
        $request->indicator_region_id != null && $request->indicator_code != null)
        $indicatorModel->insertIndicator($request->indicator_name, $request->indicator_sub_variable, $request->indicator_sub_variable_type, $request->indicator_region_id, $request->indicator_code);
        
        
    }
}