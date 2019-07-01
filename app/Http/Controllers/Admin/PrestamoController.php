<?php

namespace App\Http\Controllers\Admin;

use App\Models\Libro;
use App\Models\Alumno;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! is_null(request('estado'))){
		
			return view('admin.prestamos.index',['prestamos' => Prestamo::where('estado',request('estado'))
								->with('usuario','libro','alumno')->get()]);
		}
        return view('admin.prestamos.index',['prestamos' => Prestamo::with('usuario','libro','alumno')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prestamos.create',[
			'libros' => Libro::where('stock', '>',0)->orderBy('nombre')->get(),
			'alumnos' => Alumno::where('estado',1)->orderBy('nombre')->get()
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		DB::transaction(function () use($request) {
			$data = $this->validate($request,[
				'libro_id' =>'required|exists:libros,id',
				'alumno_id' =>'required|exists:alumnos,id',
				'fecha_fin' => 'required|date',
				'descripcion' => 'nullable',
			]);
			$prestamo = Prestamo::create($data + ['user_id' => auth()->id(), 'fecha_inicio' => now()]);
			$libro = Libro::findOrFail($prestamo->libro_id);
			if($libro ){
				$libro->update(['stock'=> ($libro->stock - 1)]);
			}
		});
       
		return redirect()->route('prestamos.index')->withSuccess('Prestamo registrado correctamente! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
		if($prestamo->estado ==2) return redirect()->route('admin');
        return view('admin.prestamos.edit',[
			'prestamo' => $prestamo,
			'libros' => Libro::where('stock', '>',0)->orderBy('nombre')->get(),
			'alumnos' => Alumno::where('estado',1)->orderBy('nombre')->get()
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
         $data = $this->validate($request,[
			'libro_id' =>'required|exists:libros,id',
			'alumno_id' =>'required|exists:alumnos,id',
			'fecha_fin' => 'required|date',
			'descripcion' => 'nullable',
		]);
		$prestamo->update($data + ['user_id' => auth()->id()]);
		if(request()->devuelto){
			$libro = Libro::findOrFail($prestamo->libro_id);
			if($libro){
				$libro->update(['stock'=> ($libro->stock + 1)]);
				$prestamo->update(['estado' => 2,'fecha_devolucion'=>now()]) ;/// 2 -> Devuelto // 1 -> prestado , 0-> Eliminado
			}
		}
		
		return redirect()->route('prestamos.index')->withSuccess('Prestamo actualizado correctamente! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        //
	}
	
	
    public function devolver(Prestamo $prestamo)
    {

		$libro = Libro::findOrFail($prestamo->libro_id);
		if($libro){
			$libro->update(['stock'=> ($libro->stock + 1)]);
		    $prestamo->update(['estado' => 2,'fecha_devolucion'=>now()]) ;// 2 -> Devuelto // 1 -> prestado , 0-> Eliminado
		}
		return redirect()->route('prestamos.index')->withSuccess('Se devolvieron los Libros');
    }
}
