<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $table = 'rute';

    public function Transportation()
    {
    	return $this->belongsTo('App\Transportation');
    }
}
