<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class IndicatorDetail extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_indicator_detail';
    protected $fillable = ['detail_indicator_id','detail_region_id'];

    //Storaged procedures
    public function getAllIndicatorDetail(){ return DB::select('call getAllIndicatorDetail()'); }
    public function insertIndicatorDetail($indicador_id,$region_id){ return DB::select('call insertIndicatorDetail(?,?)',[$indicador_id,$region_id]);}
}