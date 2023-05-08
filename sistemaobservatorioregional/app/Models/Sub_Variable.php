<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sub_Variable extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_sub_variable';
    protected $fillable = ['sub_variable_name','sub_variable_variable_id', 'sub_variable_code'];
    protected $hidden = ['sub_variable_id'];

    //Storaged procedures
    public function getAllSubVariables(){ return DB::select('call getAllSubVariables()'); }
    public function getSubVariableById($sub_variable_id)
    {
        $sub_variable = new Sub_Variable();
        $sub_variable = DB::select('call getSubVariablebyId (?)',[$sub_variable_id]);
        return $sub_variable[0];
    }
    public function getSubVariableByVariableId($sub_variable_variable_id){ return DB::select('call getSubVariableByVariableId(?)',[$sub_variable_variable_id]); }

    public function insertSubVariable($sub_variable_variable_id, $sub_variable_name, $sub_variable_code){ return DB::statement('call insertSubVariable (?,?,?)',[$sub_variable_variable_id,$sub_variable_name, $sub_variable_code]);}
    public function deleteSubVariable($sub_variable_id){ return DB::statement('call deleteSubVariable (?)',[$sub_variable_id]);}
    public function updateSubVariable($sub_variable_id, $sub_variable_variable_id, $sub_variable_name, $sub_variable_code){ return DB::statement('call updateSubVariable (?,?,?,?)',[$sub_variable_id, $sub_variable_variable_id, $sub_variable_name,$sub_variable_code]);}
}
