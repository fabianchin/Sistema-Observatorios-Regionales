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
        //dd($data);
        return response()->json($data);
    }

    //Metodo final que inserta todo
    /*
    *  RAZON DE QUE SOLO SE INSERTE UNA REFERENCIA Y DETALLE:
    *       PARA PODER DETERMINAR LA CANTIDAD DE REFERENCIAS Y DETALLES QUE SE INSERTARAN,
    *       SE DEBE HACER UNA FUNCION DESDE JS QUE DEVUELVA EL NUMERO DE REFERENCIAS Y DETALLES QUE SE INSERTARAN O UN ARRAY
    *       ESTO SE HACE CON AJAX, EL BOTON SUBMIT DEJA DE SER SUBMIT Y LLAMA UNA FUNCION DE JS
    *       SOLO POR CUESTION DE CONTRATIEMPO NO LO IMPLEMENTE
    */
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
                    
                    

                    //Referencias
                    // for($i = 0; $i < 10; $i++){ //Quemado el 10 hasta que se haga la funcion correcta, ya sea por ajax o algo que se pase un vector, o logre algo raro
                    //     if($request->reference_name_."".$i != null){
                    //         $referenceModel->insertReference($request->reference_name_."".$i); //Inserta en la tabla referencia
                    //         $lastInsertedReferenceId = DB::select('SELECT LAST_INSERT_ID();'); //Obtiene el ultimo id insertado de la tabla reference
                    //         $lastReferenceID = reset($lastInsertedReferenceId[0]);
                    //         $indicatorReferenceModel->insertIndicatorReference($lastIndicatorID,$request->region_id, $lastReferenceID); //Inserta en la tabla indicador referencia
                    //     }
                        
                    // }

                    //Por el momento se inserta solo una referencia
                    $referenceModel->insertReference($request->reference_name_0); //Inserta en la tabla referencia
                    $lastInsertedReferenceId = DB::select('SELECT LAST_INSERT_ID();'); //Obtiene el ultimo id insertado de la tabla reference
                    $lastReferenceID = reset($lastInsertedReferenceId[0]);
                    $indicatorReferenceModel->insertIndicatorReference($lastIndicatorID,$request->region_id, $lastReferenceID); //Inserta en la tabla indicador referencia

                    //Datos
                    if($request->options == 1){ //Cuantitativo
                        $indicatorDataModel->insertIndicatorDataCuantitative($request->indicator_name, $lastIndicatorID, $request->region_id);
                        // for($h = 0; $h < 10; $h++){
                        //     $indicatorDataModel->insertYearIndicatorDataCuantitative($request->datepicker_."".$h, $request->cuantitative_value_."".$h, $lastIndicatorID, $request->region_id, $request->measuremente_unit_id);
                        // }
                        $indicatorDataModel->insertYearIndicatorDataCuantitative($request->datepicker_0, $request->cuantitative_value_0, $lastIndicatorID, $request->region_id, $request->measuremente_unit_id);

                    }else{ //Cualitativo
                        $indicatorDataModel->insertIndicatorDataCualitative($request->indicator_name, 10, $lastIndicatorID, $request->region_id);
                        // for($k = 0; $k < 10; $k++){ //Quemado el 10 hasta que se haga la funcion correcta, ya sea por ajax o algo que se pase un vector, o logre algo raro
                        //    $indicatorDataModel->insertListIndicatorDataCualitative($request->list_value_."".$k, $request->cualitative_value_."".$k, $lastIndicatorID, $request->region_id, $request->measuremente_unit_id);
                        // }
                        $indicatorDataModel->insertListIndicatorDataCualitative($request->list_value_0, $request->cualitative_value_0, $lastIndicatorID, $request->region_id, $request->measuremente_unit_id);
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