<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Indicator_reference extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_indicator_reference';
    protected $fillable = ['indicator_id','indicator_reference_id']; 
    //protected $hidden = ['indicator_reference_id'];

    public function getIndicatorReferensByIndicatorId($indicator_id){ return DB::select('call getIndicatorReferensByIndicatorId(?)',[$indicator_id]);}
}
