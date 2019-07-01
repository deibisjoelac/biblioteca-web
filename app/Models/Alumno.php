<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
	 protected $guarded =  ['id'];
	 
	 public function carrera()
	{
		return $this->belongsTo('App\Models\Carrera');
	}
}
