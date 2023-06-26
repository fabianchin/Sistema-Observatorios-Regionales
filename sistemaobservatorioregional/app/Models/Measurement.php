<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Measurement extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_region';
    protected $fillable = ['measurement_unit_description']; //indicator_sub_variable_id, indicator_variable_type_id
    protected $hidden = ['measurement_unit_id'];

    public function getMeasurementUnitbyId($indicator_id){return DB::select('call getMeasurementUnitbyId(?)',[$indicator_id]);}
    public function getAllMeasurementUnit(){return DB::select('call getAllMeasurementUnit()');}
    
}