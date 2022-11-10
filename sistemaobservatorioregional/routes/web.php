<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DimensionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Rutas fuera de prefix
 //Index or home de ADMIN
 Route::get('/', function () {return view('admin_layouts.index.admin_index');});
 Route::get('/admin/index', function () {return view('admin_layouts.index.admin_index');})->name('admin.index');

 Route::get('/admin/dimension', [DimensionController::class, 'getAllDimension'])->name("dimension.manage");
 Route::get('/admin/dimension/{dimension_id}',[DimensionController::class, 'deleteDimension'])->name("dimension.delete");
 Route::post('/admin/createdimension',[DimensionController::class, 'insertDimension'])->name("dimension.insert");
 Route::post('/admin/updatedimension',[DimensionController::class, 'updateDimension'])->name("dimension.update");

//Enrutamiento para editar y crear
 Route::get('/admin/createdimension', function () { return view('admin_layouts.dimension.create');})->name("dimension.redirectToCreateDimension");
 Route::get('/admin/updatedimension/{dimension_id}',[DimensionController::class, 'loadDimensionData'])->name("dimension.redirectToUpdateDimension");
  */

//PREFIJO ADMIN
//Se le aplicara middleware de autenticacion
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {return view('admin_layouts.index.admin_index');});
    Route::get('/index', function () {return view('admin_layouts.index.admin_index');})->name('admin.index');

    //-----------------------------------------DIMENSIONES-----------------------------------------
    
    Route::get('/dimension', [DimensionController::class, 'getAllDimension'])->name("dimension.manage");
    Route::get('/dimension/{dimension_id}',[DimensionController::class, 'deleteDimension'])->name("dimension.delete");
    Route::post('/createdimension',[DimensionController::class, 'insertDimension'])->name("dimension.insert");
    Route::post('/updatedimension',[DimensionController::class, 'updateDimension'])->name("dimension.update");

    //Enrutamiento para editar y crear, ya que estas redirigen a otra pagina, las otras se mantienen en la misma pagina por medio de opciones de la tabla
    Route::get('/createdimension', function () { return view('admin_layouts.dimension.create');})->name("dimension.redirectToCreateDimension");
    //Route::get('/updatedimension/{dimension_id}',[DimensionController::class, 'loadDimensionData'])->name("dimension.redirectToUpdateDimension");
    Route::get('/updatedimension',[DimensionController::class, 'loadDimensionData'])->name("dimension.redirectToUpdateDimension");
    
    //-----------------------------------------DIMENSIONES-----------------------------------------
    
});

//-------------Dimension----------------