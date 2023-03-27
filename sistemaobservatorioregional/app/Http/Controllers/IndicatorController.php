<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;
use App\Models\Sub_Variable;
use App\Models\Variable_type;

class IndicatorController extends Controller
{
    public function getAllIndicators()
    {
        $indicatorModel = new Indicator(); 
        $indicatorModel = $indicatorModel->makeVisible(['indicator_id']); 
        $data = [          
            'indicators' => $indicatorModel->getAllIndicators()
        ];
        return view('admin_layouts.indicator.manage', $data);
    }

    //Opciones de la tabla
    public function deleteIndicator(Request $request)
    {
        $indicatorModel = new Indicator(); 
        $state = $indicatorModel->deleteIndicator($request->indicator_id);
        if($state == 1){
            return redirect()->route('indicator.manage')->with('status', 'Se elimino correctamente el indicador');
        }else{
            return redirect()->route('indicator.manage')->with('error', 'No se puede eliminar el indicador porque tiene informacion asociado');
        }
    }

    //Llenado del dropdown en la vista de crear
    public function loadDropdownData()
    {
        $subvariableModel = new Sub_Variable(); 
        $vartypeModel = new Variable_type();

        $vartypeModel = $vartypeModel->makeVisible(['variable_type_id']);
        $subvariableModel = $subvariableModel->makeVisible(['sub_variable_id']); 

        $data = [          
            'vartypes' => $vartypeModel->getAllVariableType(),
            'subs' => $subvariableModel->getAllSubVariables()
        ];
        return view('admin_layouts.indicator.create', $data);
    }

    //Llena los datos en la vista de editar
    public function loadIndicatorData(Request $request)
    {
        $indicatorModel = new Indicator();
        $subvariableModel = new Sub_Variable(); 
        $vartypeModel = new Variable_type();

        $indicatorModel = $indicatorModel->makeVisible(['indicator_id']);
        $vartypeModel = $vartypeModel->makeVisible(['variable_type_id']);
        $subvariableModel = $subvariableModel->makeVisible(['sub_variable_id']); 

        $data = [          
            //Esto es para la vista donde se hace todo de un solo
            //'variables' => $variableModel->getVariableBySubVariableVariableId($request->sub_variable_variable_id),
            'vartypes' => $vartypeModel->getAllVariableType(),
            'subs' => $subvariableModel->getAllSubVariables(),
            'indicator' => $indicatorModel->getIndicatorById($request->indicator_id)
        ];
        return view('admin_layouts.indicator.update', $data);
    }

    //onclick del boton de guardar actualizacion
    public function updateIndicator(Request $request)
    {
        if($request->indicator_id != null && $request->indicator_name != null && $request->sub_variable_id != null && $request->variable_type_id != null){
            $indicatorModel = new Indicator();
            $indicatorModel->updateIndicator($request->indicator_id, $request->indicator_name, $request->sub_variable_id, $request->variable_type_id,$request->indicator_code);    
            return redirect()->route('indicator.manage')->with('status', 'Se actualizo correctamente el indicador');
        }else if($request->indicator_id == null && $request->indicator_name != null && $request->sub_variable_id != null && $request->variable_type_id != null){
            return redirect()->route('indicator.manage')->with('status', 'No se puede actualizar el indicador porque no se encontro el id');
        }else if($request->indicator_id != null && $request->indicator_name == null && $request->sub_variable_id != null && $request->variable_type_id != null){
            return redirect()->route('indicator.manage')->with('status', 'No se puede actualizar el indicador porque no se encontro el nombre');
        }else if($request->indicator_id != null && $request->indicator_name != null && $request->sub_variable_id == null && $request->variable_type_id != null){
            return redirect()->route('indicator.manage')->with('status', 'No se puede actualizar el indicador porque no se encontro la sub variable');
        }else if($request->indicator_id != null && $request->indicator_name != null && $request->sub_variable_id != null && $request->variable_type_id == null){
            return redirect()->route('indicator.manage')->with('status', 'No se puede actualizar el indicador porque no se encontro el tipo de variable');
        }else{
            return redirect()->route('indicator.manage')->with('status', 'No se puede actualizar el indicador porque no se encontro ningun dato');
        }

    }

    //onclick del boton de guardar en la vista de crear indicador
    public function insertIndicator(Request $request)
    {
        if($request->indicator_name != null && $request->sub_variable_id != null && $request->variable_type_id != null)
        {
            $indicator = new Indicator(); 
            $indicator->insertIndicator($request->indicator_name, $request->sub_variable_id, $request->variable_type_id);
            return redirect()->route('indicator.redirectToCreateIndicator')->with('success', 'Se agrego el indicador '.$request->indicator_name.' correctamente');
        }else if($request->indicator_id != null && $request->indicator_name == null && $request->sub_variable_id != null && $request->variable_type_id != null){
            return redirect()->route('indicator.redirectToCreateIndicator')->with('error', 'No se puede agregar el indicador porque no se ha llenado el nombre');
        }else if($request->indicator_id != null && $request->indicator_name != null && $request->sub_variable_id == null && $request->variable_type_id != null){
            return redirect()->route('indicator.redirectToCreateIndicator')->with('error', 'No se puede agregar el indicador porque no se ha llenado la sub variable');
        }else if($request->indicator_id != null && $request->indicator_name != null && $request->sub_variable_id != null && $request->variable_type_id == null){
            return redirect()->route('indicator.redirectToCreateIndicator')->with('error', 'No se puede agregar el indicador porque no se ha llenado el tipo de variable');
        }else{
            return redirect()->route('indicator.redirectToCreateIndicator')->with('error', 'No se puede agregar el indicador porque no se ha llenado ningun campo');
        }
        
    }
}
