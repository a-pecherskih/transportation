<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
	protected $fillable = ['name', 'surname', 'login', 'password', 'passport'];

	public function trips() {
		return $this->hasMany('App\Models\Contract');
	}

	public function contracts() {
		return $this->hasMany('App\Models\Contract');
	}
}
