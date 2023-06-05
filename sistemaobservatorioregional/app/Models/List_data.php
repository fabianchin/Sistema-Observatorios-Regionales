<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class List_data extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_list';
    protected $fillable = ['indicator_id','list_name','list_value'];
    protected $hidden = ['list_id'];

    public function getAllListByIndicatorId($indicator_id){return DB::select('call getAllListByIndicatorId(?)',[$indicator_id]);}
    
}
