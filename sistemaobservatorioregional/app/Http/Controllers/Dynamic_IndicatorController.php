<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sub_Variable;
use App\Models\Dimension;
use App\Models\Variable;
use App\Models\Region;
use App\Models\MeasurementUnit;
use App\Models\Indicator;
use App\Models\IndicatorDetail;
use App\Models\Indicator_reference;
use App\Models\Indicator_data;
use App\Models\Reference;

use Illuminate\Support\Facades\DB; //Para usar DB::beginTransaction(); DB::commit(); DB::rollBack();

class Dynamic_IndicatorController extends Controller{

    //Clase que carga los dropdowns de la vista insert
    public function insertInit(){
        $dimensionModel = new Dimension(); 
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']); 

        $regionModel = new Region();
        $regionModel = $regionModel->makeVisible(['region_id']);

        $measurementModel = new MeasurementUnit();
        $measurementModel = $measurementModel->makeVisible(['measurement_unit_id']);

        $data = [          
            'dimensions' => $dimensionModel->getAllDimension(),
            'regions' => $regionModel->getAllRegion(),
            'measurements' => $measurementModel->getAllMeasurementUnit()
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

    //Metodo final que inserta todo
    public function insertDynamicIndicator(Request $request){
        //dd($request->all());
        
        $isInformationSavedCorrectly = true;
        $indicatorModel = new Indicator();
        $indicatorDetailModel = new IndicatorDetail();
        $indicatorReferenceModel = new Indicator_reference();
        $referenceModel = new Reference();
        $indicatorDataModel = new Indicator_data();
        
        DB::beginTransaction();
                try {
                    $indicatorModel->insertIndicator($request->indicator_name, $request->sub_variable_id, $request->options); //Inserta en la tabla indicador
                    $lastInsertedIndicatorDetailID = DB::select('SELECT LAST_INSERT_ID();'); //Obtiene el ultimo id insertado de la tabla indicador
                    $lastIndicatorID = reset($lastInsertedIndicatorDetailID[0]);
                    $indicatorDetailModel->insertIndicatorDetail($lastIndicatorID, $request->region_id); //Inserta en la tabla indicador detalle
                    
                    //Referencias--------------------------------------------
                    foreach($request->reference_name_ as $reference_link){
                        $referenceModel->insertReference($reference_link); //Inserta en la tabla referencia
                        $lastInsertedReferenceId = DB::select('SELECT LAST_INSERT_ID();'); //Obtiene el ultimo id insertado de la tabla reference
                        $lastReferenceID = reset($lastInsertedReferenceId[0]);
                        $indicatorReferenceModel->insertIndicatorReference($lastIndicatorID,$request->region_id, $lastReferenceID); //Inserta en la tabla indicador referencia
                    }
                    //Datos--------------------------------------------------
                    if($request->options == 1){ //Cuantitativo
                        $indicatorDataModel->insertIndicatorDataCuantitative($request->indicator_description, $lastIndicatorID, $request->region_id);
                        for($i=0, $count = count($request->datepicker_);$i<$count;$i++) {
                            $year  = $request->datepicker_[$i];
                            $cuantitative_value = $request->cuantitative_value_[$i];
                            $indicatorDataModel->insertYearIndicatorDataCuantitative($year, $cuantitative_value, $lastIndicatorID, $request->region_id, $request->measuremente_unit_id);
                           }
                    }else{ //Cualitativo
                        $indicatorDataModel->insertIndicatorDataCualitative($request->indicator_description, $lastIndicatorID, $request->region_id);
                        foreach($request->list_value_ as $list_value){
                            $indicatorDataModel->insertListIndicatorDataCualitative($list_value, $lastIndicatorID, $request->region_id, $request->measuremente_unit_id);
                        }
                    }
                    DB::commit();
                    $request["databaseError"] = "";

                } catch (\Exception $ex) {

                    DB::rollBack();
                    $request["databaseError"] = "Error al insertar el indicador ".$request->indicator_name.', con el error: ' . $ex->getMessage() ;
                    $isInformationSavedCorrectly = false;
                }

                if($isInformationSavedCorrectly){
                    return redirect()->route('dynamic_indicator.insert')->with('success', 'Indicador dinámico insertado correctamente');
                }else{
                    return redirect()->route('dynamic_indicator.insert')->with('error', $request["databaseError"]);
                }
                
    }
}