<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Indicator_reference extends Model
{
    use HasFactory;

    public function insertIndicatorReference ($indicator_id,$indicator_region_id, $indicator_reference_id){
        return DB::select('call insertIndicatorReference(?,?,?)',[$indicator_id,$indicator_region_id, $indicator_reference_id]);}
}
