<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DimensionController extends Controller
{
<<<<<<< Updated upstream
    //
}
=======
    // public function manage()
    // {
    //     $dimensions = new Dimension();
    //     //$dimensions->getAllDim();

    //     $data = [          
    //         'dimensions' => $dimensions->getAllDim()
    //     ];
    //     //dd('Controladora de dimensiones, DD');
    //     return view('admin_layouts.dimension.manage', $data);
    // }
    
    public function getAllDimension()
    {
        $dimensionModel = new Dimension(); 
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']); 
        $data = [          
            'dimensions' => $dimensionModel->getAllDimension()
        ];
        //dd('Controladora de dimensiones, DD');
        return view('admin_layouts.dimension.manage', $data);
    }

    //Al aplicar filtros
    // public function getDimensionById(Request $request)
    // {
    //     $dimension = new Dimension();
    //     $dimension->getProcDimensionById($request->dimension_id);
    //     return view('admin_layouts.dimension.manage', $dimension);
    // }

    //Opciones de la tabla
    public function deleteDimension(Request $request)
    {
        $dimension = new Dimension();
        $dimension->deleteDimension($request->dimension_id);
        return redirect()->route('dimension.manage'); 
    }

    //-----------------------------------------
    //onclick del boton de editar
    // public function redirectToUpdateDimension($dimension_id)
    // {
    //     return redirect()->route('dimension.updateDimension', $dimension_id);
    //     //return view('admin_layouts.dimension.update', $dimension_id);
    // }

    public function loadDimensionData(Request $request)
    {
        $dimension = new Dimension();
        $dimensionTemp = $dimension->getDimensionById($request->dimension_id);
        return view('admin_layouts.dimension.update', ['dimension'=>$dimensionTemp]);
    }

    public function loadDimensionData2(Request $request)
    {
        $dimensionModel = new Dimension();
        $dimensionModel = $dimensionModel->makeVisible(['dimension_id']);  
        $data = [          
            'dimension' => $dimensionModel->getDimensionById($request->dimension_id)
        ];        
        return view('admin_layouts.dimension.update',  $data);
    }


    //onclick del boton de guardar actualizacion
    public function updateDimension(Request $request)
    {
        $dimension = new Dimension();
        $dimension->updateDimension($request->dimension_id,$request->dimension_name);
        return redirect()->route('dimension.manage')->with('success', 'Dimension actualizada correctamente'); 
        // return view('admin_layouts.dimension.update', $dimension_id);
    }

    //------------------------------------------

    // //onclick del boton de crear
    // public function redirectToInsertDimension()
    // {
    //     return redirect()->route('dimension.create');
    //     //return view('admin_layouts.dimension.create');
    // }

    //onclick del boton de guardar en la vista de crear dimension
    public function insertDimension(Request $request)
    {
        $dimension = new Dimension();
        $dimension->insertDimension($request->dimension_name);
        return redirect()->route('dimension.redirectToCreateDimension');//->with('success', 'Se agrego la dimension '.$request->dimension_name.' correctamente'); 
        //return redirect()->route('dimension.manage');
    }

}
>>>>>>> Stashed changes
