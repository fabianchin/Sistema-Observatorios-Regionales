<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Variable_type extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_variable_type';
    protected $fillable = ['variable_type_category'];
    protected $hidden = ['variable_type_id'];

    public function getAllVariableType(){ return DB::select('call getAllVariableType()'); }
    public function getVariableTypeById($variable_type_id)
    {
        $variabletype = new Variable_type();
        $variabletype = DB::select('call getVariableTypebyId(?)',[$variable_type_id]);
        return $variabletype[0];
    }    
    public function insertVariableType($variable_type_category){ return DB::statement('call insertVariableType(?)',[$variable_type_category]);}
    public function deleteVariableType($variable_type_id){ return DB::statement('call deleteVariableType(?)',[$variable_type_id]);}
    public function updateVariableType($variable_type_id,$variable_type_category){ return DB::statement('call updateVariableType(?,?)',[$variable_type_id,$variable_type_category]);}
}