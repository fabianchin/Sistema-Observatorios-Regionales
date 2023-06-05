<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Indicator_data_cuantitative extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_indicator_data_cuantitative';
    protected $fillable = ['indicator_id','measurement_unit_id','indicator_data_description']; //indicator_sub_variable_id, indicator_variable_type_id
    
    public function getAllIndicatorDataCuantitativebyId($indicator_id){return DB::select('call getAllIndicatorDataCuantitativebyId(?)',[$indicator_id]);}
}