<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Region extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_region';
    protected $fillable = ['region_name','region_acronym']; //indicator_sub_variable_id, indicator_variable_type_id
    protected $hidden = ['region_id'];
	
    public function getRegionbyId($region_id){ return DB::select('call getRegionbyId(?)',[$region_id]);}

}
