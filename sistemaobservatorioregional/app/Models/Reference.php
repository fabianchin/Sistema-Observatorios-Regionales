<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reference extends Model
{
    use HasFactory;

    public function insertReference ($link){return DB::select('call insertReference(?)',[$link]);}
}
