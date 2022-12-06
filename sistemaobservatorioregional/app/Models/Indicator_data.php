<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Indicator_data extends Model
{
    use HasFactory;

    //Cuantitative
    public function insertIndicatorDataCualitative($desctiption ,$total, $indicator_id, $region_id){ return DB::statement('call insertIndicatorDataCualitative(?,?,?,?)',[$desctiption ,$total, $indicator_id, $region_id]);}
    public function insertListIndicatorDataCualitative ($name,$value,$indicator_id,$region_id,$measurement_unit_id){ return DB::statement('call insertListIndicatorDataCualitative(?,?,?,?,?)',[$name,$value,$indicator_id,$region_id,$measurement_unit_id]);}
    //Cualitative
    public function insertIndicatorDataCuantitative ($desctiption,$indicator_id,$region_id) {return DB::statement('call insertIndicatorDataCuantitative(?,?,?)',[$desctiption,$indicator_id,$region_id]);}
    public function insertYearIndicatorDataCuantitative ($year,$value,$indicator_id,$region_id,$measurement_unit_id) {return DB::statement('call insertYearIndicatorDataCuantitative(?,?,?,?,?)',[$year,$value,$indicator_id,$region_id,$measurement_unit_id]);}

}
