<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Year extends Model
{
    use HasFactory;
    protected $table = 'tb_obs_year';
    protected $fillable = ['year_value'];
    protected $hidden = ['year_id'];
    
    public function getAllYears(){return DB::select('call getAllYears()',[]);}
}
