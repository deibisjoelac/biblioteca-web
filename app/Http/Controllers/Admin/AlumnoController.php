<?php

namespace App\Http\Controllers\Admin;

use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alumnos.index',['alumnos' => Alumno::with('carrera')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alumnos.create',['carreras' => Carrera::where('estado',1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
			'documento' =>'required|min:8|unique:alumnos,documento',
			'carrera_id' =>'required|exists:carreras,id',
			'nombre' =>'required|min:4',
			'telefono' => 'nullable',
			'email' => 'nullable',
			'direccion' => 'nullable',
		]);
		Alumno::create($data);
		return redirect()->route('alumnos.index')->withSuccess('Alumno registrado correctamente! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return redirect()->route('alumnos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('admin.alumnos.edit', [ 'alumno' =>$alumno ,'carreras' => Carrera::where('estado',1)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $data = $this->validate($request,[
			'documento' =>'required|min:8|unique:alumnos,documento,'. $alumno->id,
			'carrera_id' =>'required|exists:carreras,id',
			'nombre' =>'required|min:4',
			'telefono' => 'nullable',
			'email' => 'nullable',
			'direccion' => 'nullable',
		]);
		$alumno->update($data);
		return redirect()->route('alumnos.index')->withSuccess('Alumno actualizado correctamente! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno = $alumno->update(['estado'=> ! $alumno->estado]);
		return redirect()->route('alumnos.index')->withSuccess( ($alumno->estado ? 
						'Alumno activado correctamente! ' : 'Alumno dado de baja correctamente! '));
    }
}
