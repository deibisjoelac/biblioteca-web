<?php

namespace App\Http\Controllers\Admin;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alumno;

class ConsultaController extends Controller
{
    public function index()
	{
		if(request('libro') && is_null(request('alumno'))) $prestamos = Prestamo::where('libro_id',request('libro'))->get();
		else  if(is_null(request('libro')) && request('alumno')) $prestamos = Prestamo::where('alumno_id',request('alumno'))->get();
		else if(request('libro') && request('alumno')) $prestamos = Prestamo::where('libro_id',request('libro'))
							->where('alumno_id',request('alumno'))->get();
		else $prestamos= Prestamo::all();
		return view('admin.consultas.index',[
			'libros' => Libro::all(),
			'alumnos' => Alumno::all(),
			'libroSelect' =>Libro::where('id',request('libro'))->first(),
			'prestamos' => $prestamos
		]);
	}
}
