<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'transportation';

    public function Transportation_type()
    {
    	return $this->belongsTo('App\Transportation_type');
    }
}
