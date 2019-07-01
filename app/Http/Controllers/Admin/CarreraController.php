<?php

namespace App\Http\Controllers\Admin;

use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.carreras.index', [
			'carreras' => Carrera::all()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carreras.create');
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
			'nombre' =>'required|min:4',
			'descripcion' => 'nullable'
		]);
		Carrera::create($data);
		return redirect()->route('carreras.index')->withSuccess('Carrera registrada correctamente! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        return redirect()->route('admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        return view('admin.carreras.edit',compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
		$data = $this->validate($request,[
			'nombre' =>'required|min:4',
			'descripcion' => 'nullable'
		]);
		$carrera->update($data);
		return redirect()->route('carreras.index')->withSuccess('Carrera actualizada correctamente! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
		
		$carrera = $carrera->update(['estado'=> ! $carrera->estado]);
		return redirect()->route('carreras.index')->withSuccess( ($carrera->estado ? 
						'Carrera activada correctamente! ' : 'Carrera dada de baja correctamente! '));
    }
}
