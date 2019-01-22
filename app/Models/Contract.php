<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    protected $fillable = ['number', 'volume', 'weight', 'volume_weight', 'price', 'leave', 'archivation', 'services', 'trip_id', 'client_id', 'user_id'];

    public function client() {
    	return $this->belongsTo('App\Models\Client');
    }

    public function trip() {
    	return $this->belongsTo('App\Models\Trip');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
