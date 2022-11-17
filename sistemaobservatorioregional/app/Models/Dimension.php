<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_dimension';
    protected $fillable = ['dimension_name'];
    protected $hidden = ['dimension_id'];

    //Storaged procedures
    public function getAllDimension(){ return DB::select('call getAllDimension()'); }
    public function getDimensionById($dimension_id)
    {
        $dimension = new Dimension();
        $dimension = DB::select('call getDimensionById(?)',[$dimension_id]);
        return $dimension[0];
    }
    public function insertDimension($dimension_name){ return DB::statement('call insertDimension(?)',[$dimension_name]);}
    public function deleteDimension($dimension_id){ return DB::statement('call deleteDimension(?)',[$dimension_id]);}
    public function updateDimension($dimension_id, $dimension_name){ return DB::statement('call updateDimension(?,?)',[$dimension_id, $dimension_name]);}
}