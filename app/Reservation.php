<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';

    public function Costumer()
    {
    	return $this->belongsTo('App\Costumer');
    }

    public function Rute()
    {
    	return $this->belongsTo('App\Rute');
    }

    public function User()
    {
    	return $this->belongsTo('App\User');
    }

    public function Transportation()
    {
        return $this->belongsTo('App\Transportation');
    }

    public function Transportation_type()
    {
        return $this->belongsTo('App\Transportation_type');
    }
}
