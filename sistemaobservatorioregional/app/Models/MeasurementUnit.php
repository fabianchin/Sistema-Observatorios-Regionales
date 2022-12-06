<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MeasurementUnit extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_measuement_unit';
    protected $fillable = ['measurement_unit_description'];
    protected $hidden = ['measurement_unit_id'];

    //Storaged procedures
    public function getAllMeasurementUnit(){ return DB::select('call getAllMeasurementUnit()'); }
    public function getMeasurementById($measurement_unit_id)
    {
        $measurement_unit = new MeasurementUnit();
        $measurement_unit = DB::select('call getMeasurementById(?)',[$measurement_unit_id]);
        return $measurement_unit[0];
    }
}