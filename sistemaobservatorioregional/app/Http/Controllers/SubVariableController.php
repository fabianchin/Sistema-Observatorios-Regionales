<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_Variable;
use App\Models\Variable;

class SubVariableController extends Controller
{
    public function getAllSubVariables()
    {
        $subModel = new Sub_Variable(); 
        $subModel = $subModel->makeVisible(['sub_variable_id']); 
        $data = [          
            'subs' => $subModel->getAllSubVariables()
        ];
        return view('admin_layouts.sub_variable.manage', $data);
    }

    //Opciones de la tabla
    public function deleteSubVariable(Request $request)
    {
        $subModel = new Sub_Variable(); 
        $state = $subModel->deleteSubVariable($request->sub_variable_id);
        if($state == 1){
            return redirect()->route('sub_variable.manage')->with('status', 'Se elimino correctamente la sub variable');
        }else{
            return redirect()->route('sub_variable.manage')->with('error', 'No se puede eliminar la sub-variable porque tiene preguntas asociadas');
        }
    }

    //Llenado del dropdown en la vista de crear
    public function loadDropdownData()
    {
        $variableModel = new Variable(); 
        $variableModel = $variableModel->makeVisible(['variable_id']); 
        $data = [          
            'variables' => $variableModel->getAllVariables()
        ];
        return view('admin_layouts.sub_variable.create', $data);
    }

    //Llena los datos en la vista de editar
    public function loadSubVariableData(Request $request)
    {
        $subModel = new Sub_Variable(); 
        $variableModel = new Variable();

        $variableModel = $variableModel->makeVisible(['variable_id']); 
        $subModel = $subModel->makeVisible(['sub_variable_id']);

        $data = [          
            //Esto es para la vista donde se hace todo de un solo
            //'variables' => $variableModel->getVariableBySubVariableVariableId($request->sub_variable_variable_id),
            'variables' => $variableModel->getAllVariables(),
            'sub' => $subModel->getSubVariableById($request->sub_variable_id)
        ];

        $subTemp = $subModel->getSubVariableById($request->sub_variable_id);
        return view('admin_layouts.sub_variable.update', $data);
    }

    //onclick del boton de guardar actualizacion
    public function updateSubVariable(Request $request)
    {
        if($request->sub_variable_name != null && $request->sub_variable_variable_id != null)
        {
            $subModel = new Sub_Variable(); 
            $subModel->updateSubVariable($request->sub_variable_id,$request->sub_variable_variable_id,$request->sub_variable_name);
            return redirect()->route('sub_variable.manage')->with('success', 'Se actualizao correctamente la sub variable '.$request->sub_variable_name.'');
        }
        else if($request->sub_variable_name == null && $request->sub_variable_variable_id != null){
            return redirect()->route('sub_variable.manage')->with('error', 'No se puede actualizar la sub-variable porque no se ingreso un nombre');
        }
        else if($request->sub_variable_name != null && $request->sub_variable_variable_id == null){
            return redirect()->route('sub_variable.manage')->with('error', 'No se puede actualizar la sub-variable porque no se selecciono una variable');
        }
        else
        {
            return redirect()->route('sub_variable.manage')->with('error', 'No se puede actualizar la sub-variable porque no se ingreso un nombre y no se selecciono una variable');
        }
    }

    //onclick del boton de guardar en la vista de crear dimension
    public function insertSubVariable(Request $request)
    {

       
       
        if($request->sub_variable_name != null && $request->sub_variable_variable_id != null)
        {
            $subModel = new Sub_Variable(); 
            $subModel->insertSubVariable($request->sub_variable_variable_id,$request->sub_variable_name,$request->code_param);
            return redirect()->route('sub_variable.redirectToCreateSubVariable')->with('success', 'Se agrego la sub variable '.$request->sub_variable_name.' correctamente');
        }
        else if($request->sub_variable_name == null && $request->sub_variable_variable_id != null){
            return redirect()->route('sub_variable.redirectToCreateSubVariable')->with('error', 'No se puede agregar la sub-variable porque no se ingreso un nombre');
        }
        else if($request->sub_variable_name != null && $request->sub_variable_variable_id == null){
            return redirect()->route('sub_variable.redirectToCreateSubVariable')->with('error', 'No se puede agregar la sub-variable porque no se selecciono una variable');
        }
        else
        {
            return redirect()->route('sub_variable.redirectToCreateSubVariable')->with('error', 'No se puede agregar la sub-variable porque no se ingreso un nombre y no se selecciono una variable');
        }
    }
}
