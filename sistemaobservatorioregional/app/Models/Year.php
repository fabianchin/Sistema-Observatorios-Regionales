<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Year extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_year';
    protected $fillable = ['year_id','year_value'];
    protected $hidden = ['indicator_id', 'indicator_region_id'];
    
    public function getYearByIndicatorId($indicator_id){return DB::select('call getgetAllYearByIndicatorId(?)',[$indicator_id]);}
}
