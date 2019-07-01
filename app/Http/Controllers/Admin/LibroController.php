<?php

namespace App\Http\Controllers\Admin;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Http\Requests\LibroRequest;
use App\Http\Controllers\Controller;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.libros.index', [ 'libros' => Libro::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibroRequest $request)
    {
        $portada = $request->portada->store('libros/portadas');
        $libro_pdf = $request->libro_pdf->store('libros/pdf');
		Libro::create($request->only('nombre','editorial','categoria','autor','numero_paginas','stock','descripcion')+ ['portada'=> $portada,'libro_pdf'=> $libro_pdf]);
		return redirect()->route('libros.index')->withSuccess('Libro registrado correctamente! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('admin.libros.edit',[
			'libro' => $libro
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(LibroRequest $request, Libro $libro)
    {
        Storage::delete($libro->portada);
        Storage::delete($libro->libro_pdf);
		$libro->update($request->only('nombre','editorial','categoria','autor','numero_paginas','stock','descripcion')+['portada'=> $portada,'libro_pdf'=> $libro_pdf]);
		return redirect()->route('libros.index')->withSuccess('Libro actualizado correctamente! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
		// $libro->update(['estado'=> !! $libro->estado]);
		// return redirect()->route('libros.index')->withSuccess( ($libro->estado ? 
		// 				'Libro activado correctamente! ' : 'Libro dado de baja correctamente! '));
    }
}
