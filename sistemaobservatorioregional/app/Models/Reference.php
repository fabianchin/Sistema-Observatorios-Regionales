<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reference extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_region';
    protected $fillable = ['reference_link']; //indicator_sub_variable_id, indicator_variable_type_id
    protected $hidden = ['reference_id'];

    public function getAllReferenceByIndicatorId($indicator_id){ return DB::select('call getAllReferenceByIndicatorId(?)',[$indicator_id]);}
    
}
