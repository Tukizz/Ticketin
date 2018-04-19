<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

   

    protected $primaryKey = 'username';
    public $incrementing = false;


    protected $fillable = [
        'name','username', 'email', 'password', 'jabatan',
    ];

    
    public function costumer()
    {
         return $this->HasOne('App\Costumer','users_id');
    }

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }
}
