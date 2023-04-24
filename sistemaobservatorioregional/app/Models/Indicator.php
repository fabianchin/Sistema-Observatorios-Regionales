<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Indicator extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_indicator';
    protected $fillable = ['indicator_name','indicator_sub_variable','indicator_sub_variable_type']; //indicator_sub_variable_id, indicator_variable_type_id
    protected $hidden = ['indicator_id'];

    //Storaged procedures
    public function getAllIndicators(){ return DB::select('call getAllIndicator()'); }
    public function getIndicatorById($indicator_id)
    {
        $indicator = new Indicator();
        $indicator = DB::select('call getIndicatorById(?)',[$indicator_id]);
        return $indicator[0];
    }    
    public function getIndicadorBySubVariableId($sub_variable_id){ return DB::select('call getIndicadorBySubVariableId(?)',[$sub_variable_id]); }

    public function insertIndicator($indicator_name, $indicator_sub_variable, $indicator_sub_variable_type){ return DB::statement('call insertIndicator(?,?,?)',[$indicator_name,$indicator_sub_variable, $indicator_sub_variable_type]);}
    public function deleteIndicator($indicator_id){ return DB::statement('call deleteIndicator(?)',[$indicator_id]);}
    public function updateIndicator($indicator_id,$indicator_name, $indicator_sub_variable, $indicator_sub_variable_type){ return DB::statement('call updateIndicator(?,?,?,?)',[$indicator_id,$indicator_name, $indicator_sub_variable, $indicator_sub_variable_type]);}
}
