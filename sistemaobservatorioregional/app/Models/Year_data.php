<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Year_data extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_year';
    protected $fillable = ['year_id','indicatord_id','year_indicator_data'];
    
    public function getAllYearByIndicatorId($indicator_id){return DB::select('call getAllYearByIndicatorId(?)',[$indicator_id]);}
}
