<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use Illuminate\Http\Request;
use App\Models\Variable;
use Termwind\Components\Dd;

class VariableController extends Controller
{
    //Llenado de tabla
    public function getAllVariables()
    {
        $variableModel = new Variable(); 
        $variableModel = $variableModel->makeVisible(['variable_id']); 
        $data = [          
            'variables' => $variableModel->getAllVariables()
        ];
        return view('admin_layouts.variable.manage', $data);
    }

    //Opciones de la tabla
    public function deleteVariable(Request $request)
    {
        $variableModel = new Variable(); 
        $variableModel->deleteVariable($request->variable_id);
        return redirect()->route('variable.manage'); 
    }

    //Llenado del dropdown en la vista de crear
    public function loadDropdownData()
    {
        $dimensionModel = new Dimension(); 
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']); 
        $data = [          
            'dimensions' => $dimensionModel->getAllDimension()
        ];
        return view('admin_layouts.variable.create', $data);
    }

    //Llena los datos en la vista de editar
    public function loadVariableData(Request $request)
    {
        $variableModel = new Variable(); 
        $dimensionModel = new Dimension(); 

        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']);    
        $variableModel = $variableModel->makeVisible(['variable_id']);

        $data = [          
            'dimensions' => $dimensionModel->getAllDimension(),
            'variable' => $variableModel->getVariableById($request->variable_id)
        ];
        return view('admin_layouts.variable.update', $data);
    }

    //onclick del boton de guardar actualizacion
    public function updateVariable(Request $request)
    {
        if($request->variable_name != null && $request->variable_dimension_id != null)
        {
            $variableModel = new Variable(); 
            $variableModel->updateVariable($request->variable_id,$request->variable_dimension_id,$request->variable_name, $request->acronym);
            return redirect()->route('variable.manage')->with('success', 'Variable actualizada correctamente');
        }
        else if($request->variable_name == null && $request->variable_dimension_id != null)
        {
            // dd('El nombre de la variable esta vacio');
            return redirect()->route('variable.manage')->with('error', 'El nombre de la variable no puede estar vacio');
        }
        else if($request->variable_name != null && $request->variable_dimension_id == null)
        {
            // dd('La dimension de la variable esta vacia');
            return redirect()->route('variable.manage')->with('error', 'Debe seleccionar una dimension');
        }
        else
        {
            // dd('El nombre de la variable esta vacio y la dimension de la variable esta vacia');
            return redirect()->route('variable.manage')->with('error', 'Debe seleccionar una dimension y el nombre de la variable no puede estar vacio');
        }
    }

    //onclick del boton de guardar en la vista de crear dimension
    public function insertVariable(Request $request)
    {
        if($request->variable_name != null && $request->variable_dimension_id != null)
        {
            $variableModel = new Variable(); 
            $variableModel->insertVariable($request->variable_dimension_id,$request->variable_name, $request->acronym);
            return redirect()->route('variable.manage')->with('success', 'Variable creada correctamente'); 
        }
        else if($request->variable_name == null && $request->variable_dimension_id != null)
        {
            return redirect()->route('variable.create')->with('error', 'El nombre de la variable no puede estar vacio');
        }
        else if($request->variable_name != null && $request->variable_dimension_id == null)
        {
            return redirect()->route('variable.create')->with('error', 'Debe seleccionar una dimension');
        }
        else
        {
            return redirect()->route('variable.create')->with('error', 'Debe seleccionar una dimension y el nombre de la variable no puede estar vacio');
        }
    }
}
