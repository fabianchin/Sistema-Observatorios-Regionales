<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\DimensionController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\SubVariableController;
use App\Http\Controllers\Dynamic_IndicatorController;
use App\Http\Controllers\ReportsController;

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



Route::group(['middleware' => ['auth']], function () {


    //-----------------------------------------INDEX-----------------------------------------
    Route::get('/variable', [VariableController::class, 'getAllVariables'])->name("variable.manage");
    Route::get('/', function () {
        return view('admin_layouts.index.admin_index');
    })->name('dashboard');
    Route::get('/index', function () {
        return view('admin_layouts.index.admin_index');
    })->name('admin.index');

    //-----------------------------------------DIMENSIONES-----------------------------------------
    Route::group(['prefix' => 'dimensiones'], function () {
        Route::get('/', [DimensionController::class, 'getAllDimension'])->name("dimension.manage");
        Route::get('/dimension/{dimension_id}', [DimensionController::class, 'deleteDimension'])->name("dimension.delete");
        Route::post('/createdimension', [DimensionController::class, 'insertDimension'])->name("dimension.insert");
        Route::post('/updatedimension', [DimensionController::class, 'updateDimension'])->name("dimension.update");
        //Enrutamiento para editar y crear, ya que estas redirigen a otra pagina, las otras se mantienen en la misma pagina por medio de opciones de la tabla
        Route::get('/createdimension', function () {
            return view('admin_layouts.dimension.create');
        })->name("dimension.redirectToCreateDimension");
        Route::get('/updatedimension', [DimensionController::class, 'loadDimensionData'])->name("dimension.redirectToUpdateDimension");
    });

    //-----------------------------------------VARIABLES-----------------------------------------

    Route::group(['prefix' => 'variables'], function () {

        Route::get('/', [VariableController::class, 'getAllVariables'])->name("variable.manage");
        Route::get('/variable/{variable_id}', [VariableController::class, 'deleteVariable'])->name("variable.delete");
        Route::post('/createvariable', [VariableController::class, 'insertVariable'])->name("variable.insert");
        Route::post('/updatevariable', [VariableController::class, 'updateVariable'])->name("variable.update");
        Route::get('/createvariable', [VariableController::class, 'loadDropdownData'])->name("variable.redirectToCreateVariable");
        Route::get('/updatevariable', [VariableController::class, 'loadVariableData'])->name("variable.redirectToUpdateVariable");
    });
    //-----------------------------------------SUB_VARIABLES-----------------------------------------
    Route::group(['prefix' => 'sub_varibles'], function () {
        Route::get('/', [SubVariableController::class, 'getAllSubVariables'])->name("sub_variable.manage");
        Route::get('/sub_variable/{sub_variable_id}', [SubVariableController::class, 'deleteSubVariable'])->name("sub_variable.delete");
        Route::post('/createsubvariable', [SubVariableController::class, 'insertSubVariable'])->name("sub_variable.insert");
        Route::post('/updatesubvariable', [SubVariableController::class, 'updateSubVariable'])->name("sub_variable.update");
        Route::get('/createsubvariable', [SubVariableController::class, 'loadDropdownData'])->name("sub_variable.redirectToCreateSubVariable");
        Route::get('/updatesubvariable', [SubVariableController::class, 'loadSubVariableData'])->name("sub_variable.redirectToUpdateSubVariable");
    });
    //-----------------------------------------INDICADORES-----------------------------------------
    Route::group(['prefix' => 'indicadores'], function () {
        Route::get('/', [IndicatorController::class, 'getAllIndicators'])->name("indicator.manage");
        Route::get('/indicator/{indicator_id}', [IndicatorController::class, 'deleteIndicator'])->name("indicator.delete");
        Route::post('/createindicator', [IndicatorController::class, 'insertIndicator'])->name("indicator.insert");
        Route::post('/updateindicator', [IndicatorController::class, 'updateIndicator'])->name("indicator.update");
        Route::get('/createindicator', [IndicatorController::class, 'loadDropdownData'])->name("indicator.redirectToCreateIndicator");
        Route::get('/updateindicator', [IndicatorController::class, 'loadIndicatorData'])->name("indicator.redirectToUpdateIndicator");
    });
    //-----------------------------------------DYNAMIC INDICATORS-----------------------------------------
    Route::get('/insert_dynamic_indicator', [Dynamic_IndicatorController::class, 'insertInit'])->name("dynamic_indicator.load");
    Route::post('/insert_dynamic_indicator', [Dynamic_IndicatorController::class, 'insertDynamicIndicator'])->name("dynamic_indicator.insert");

    //Fill comboboxes
    Route::post('/fillVariable', [Dynamic_IndicatorController::class, 'fillVariable'])->name("dynamic_indicator.fillVariable");
    Route::post('/fillSubVariable', [Dynamic_IndicatorController::class, 'fillSubVariable'])->name("dynamic_indicator.fillSubVariable");
    Route::post('/fetch-regions', [Dynamic_IndicatorController::class, 'getAllRegions'])->name('fetch.regions');
    Route::post('/fetch-measurements', [Dynamic_IndicatorController::class, 'getAllMeasurementUnit'])->name('fetch.measurements');
    Route::post('/fetch-years', [Dynamic_IndicatorController::class, 'getAllyears'])->name('fetch.years');






    //-----------------------------------------LOGOUT-----------------------------------------
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

    //-----------------------------------------Reportes -----------------------------------------
    Route::get('/report', [ReportsController::class, 'genReport'])->name('report');
    Route::get('/view-report', [ReportsController::class,'createReport'])->name('report.create');
    Route::post('/fillVariableReport',[ReportsController::class, 'fillVariable'])->name("report.fillVariable");
    Route::post('/fillSubVariableReport',[ReportsController::class, 'fillSubVariable'])->name("report.fillSubVariable");
    Route::post('/fillIndicatorReport',[ReportsController::class, 'fillIndicator'])->name("report.fillIndicator");
    Route::post('downloadRepor',[ReportsController::class, 'fillIndicator'])->name("download.report");
//-----------------------------------------actualizar informacion de usuario-----------------------------------------
    Route::group(['prefix' => 'usuarios'], function () {
        Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
        Route::post('/confirm-password', [PerfilController::class, 'confirm'])->name('perfil.confirm');
        Route::get('/confirm-password', [PerfilController::class, 'confirmView'])->name('perfil.confirm.password');
        Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');
        Route::get('/', [PerfilController::class, 'getAllUsers'])->name('perfil.list');
        Route::post('/user/{user_id}', [PerfilController::class, 'destroy'])->name('perfil.destroy');
    });

});


//-----------------------------------------LOGIN-----------------------------------------
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
//-----------------------------------------registro de Usuarios-----------------------------------------
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/', function () {
    return view('/welcome');
});


