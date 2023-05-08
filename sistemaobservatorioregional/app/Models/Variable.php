<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_variable';
    protected $fillable = ['variable_dimension_id','variable_name','acronimo'];
    protected $hidden = ['variable_id'];

    //Storaged procedures
    public function getAllVariables(){ return DB::select('call getAllVariables()'); }
    public function getVariableById($variable_id)
    {
        $variable = new Variable();
        $variable = DB::select('call getVariablebyId(?)',[$variable_id]);
        if (count($variable) > 0) {
            return $variable[0];
        } else {
            return null;
        }
    }
    public function getVariableByDimensionId($variable_dimension_id){ return DB::select('call getVariableByDimensionId(?)',[$variable_dimension_id]); }
    public function getVariableBySubVariableVariableId($sub_variable_variable_id){ return DB::select('call getVariableBySubVariableVariableId(?)',[$sub_variable_variable_id]); }
    
    public function insertVariable($variable_dimension_id, $variable_name,$acronimo){ return DB::statement('call insertVariable(?,?,?)',[$variable_dimension_id,$variable_name,$acronimo]);}
    public function deleteVariable($variable_id){ return DB::statement('call deleteVariable(?)',[$variable_id]);}
    public function updateVariable($variable_id, $variable_dimension_id, $variable_name,$acronimo){ return DB::statement('call updateVariable(?,?,?,?)',[$variable_id, $variable_dimension_id, $variable_name,$acronimo]);}
}
