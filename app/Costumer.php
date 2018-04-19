<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $table = 'costumer';
    protected $fillable = [
        'name','address','phone','gender','email','users_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User','users_id');
    }
}
