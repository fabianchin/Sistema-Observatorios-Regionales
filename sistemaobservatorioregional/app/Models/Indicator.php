<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Indicator extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_indicator';
    protected $fillable = ['indicator_name','indicator_sub_variable','indicator_sub_variable_type', 'indicator_code']; //indicator_sub_variable_id, indicator_variable_type_id
    protected $hidden = ['indicator_id'];

    //Storaged procedures
    public function getAllIndicators(){ return DB::select('call getAllIndicator()'); }
    public function getAllIndicatorsBySubVariableId($indicator_sub_variable_id){return DB::select('call getAllIndicatorBySubVariableId(?)',[$indicator_sub_variable_id]); }
    public function getIndicatorById($indicator_id)
    {
        $indicator = new Indicator();
        $indicator = DB::select('call getIndicatorById(?)',[$indicator_id]);
        if(count($indicator) > 0){
            return $indicator[0];
        }
        return null;
    }    
    public function insertIndicator($indicator_name, $indicator_sub_variable, $indicator_sub_variable_type, $indicator_code){ return DB::statement('call insertIndicator(?,?,?,?)',[$indicator_name,$indicator_sub_variable, $indicator_sub_variable_type,$indicator_code]);}
    public function deleteIndicator($indicator_id){ return DB::statement('call deleteIndicator(?)',[$indicator_id]);}
    public function updateIndicator($indicator_id,$indicator_name, $indicator_sub_variable, $indicator_sub_variable_type,$indicator_code){ return DB::statement('call updateIndicator(?,?,?,?,?)',[$indicator_id,$indicator_name, $indicator_sub_variable, $indicator_sub_variable_type,$indicator_code]);}

    //Get informacion Indicators
   
   
    
}
