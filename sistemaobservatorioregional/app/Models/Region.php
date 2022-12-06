<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_region';
    protected $fillable = ['region_name'];
    protected $hidden = ['region_id'];

    //Storaged procedures
    public function getAllRegion(){ return DB::select('call getAllRegion()'); }
    public function getAllRegionById($region_id)
    {
        $region = new Region();
        $region = DB::select('call getMeasurementById(?)',[$region_id]);
        return $region[0];
    }
}