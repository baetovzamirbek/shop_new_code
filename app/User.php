<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function saveUser($email, $password, $first_name, $last_name)
    {
        date_default_timezone_set('Asia/Bishkek');
        $creation_date = date('Y/m/d H:i:s');
        DB::table('users')->insert(
            [
                'email' => $email,
                'password' => Hash::make($password),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'created_at' => $creation_date
            ]
        );
    }

    public static function getUsers()
    {
        $data = DB::table('users')->get();
        return $data;
    }
}
