<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
	protected $guarded = ['id'];
	
	public function usuario()
	{
		return $this->belongsTo('App\User','user_id');
	}

	public function alumno()
	{
		return $this->belongsTo('App\Models\Alumno');
	}

	public function libro()
	{
		return $this->belongsTo('App\Models\Libro');
	}


	public function vencimiento()
	{
		return $this->fecha_fin < now();
	}
}
