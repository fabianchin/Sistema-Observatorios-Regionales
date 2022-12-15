<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'name',
    ];

    protected $table = 'users';
    //Storaged procedures

    public function getAllUsers(){ return DB::select('call getAllUsers()'); }
    public function getUserById($user_id)
    {
        $user = new User();
        $user = DB::select('call getUserbyId(?)',[$user_id]);
        return $user[0];
    }

    public function insertUser($user_name, $user_email, $user_password){ return DB::statement('call insertUser(?,?,?)',[$user_name,$user_email,$user_password]);}
    public function deleteUser($user_id){ return DB::statement('call deleteUser(?)',[$user_id]);}
    public function updateUser($user_id, $user_name, $user_email, $user_password){ return DB::statement('call updateUser(?,?,?,?)',[$user_id, $user_name, $user_email, $user_password]);}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}