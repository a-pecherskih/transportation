<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    //
    protected $fillable = ['name'];

    public function pointArrival()
    {
    	return $this->hasMany('App\Models\Trip', 'arrival_id');
    }

    public function pointDeparture()
    {
    	return $this->hasMany('App\Models\Trip', 'departure_id');
    }


    public function trips() 
    {
    	return $this->pointArrival->merge($this->pointDeparture);
    }
}
