<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = ['coefficient', 'lasting', 'price_kg', 'overpricing', 'departure_id', 'arrival_id'];

    public function arrival() 
    {
    	return $this->belongsTo('App\Models\Point', 'arrival_id');
    }

    public function departure() 
    {
        return $this->belongsTo('App\Models\Point', 'departure_id');
    }

    public function points() 
    {
        return $this->arrival->merge($this->departure);
    }

    public function services()
    {
		return $this->belongsToMany('App\Models\Service');
    }

    public function contracts() 
    {
        return $this->hasMany('App\Models\Contract');
    }
}
