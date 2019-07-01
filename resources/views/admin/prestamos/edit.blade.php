@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Modificar Préstamo
					</div>
					<div class="card-body">
						@include('partials.error-messages')
						<form action="{{ route('prestamos.update', $prestamo) }}" method="POST" autocomplete="off">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label for="alumno_id">Alumno *</label>
								<select name="alumno_id" class="form-control" {{$prestamo->estado== 2 && auth()->id() !==1  ? 'disabled' : ''}}>
									<option value="">Seleccione Alumno</option>
									@foreach ($alumnos as $alumno)
										<option value="{{ $alumno->id }}" 
											{{ $alumno->id === $prestamo->alumno_id ? 'selected' : '' }}>{{ $alumno->nombre }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="libro_id">Libro *</label>
								<select name="libro_id" class="form-control" {{$prestamo->estado== 2 && auth()->id() !==1  && auth()->id() !==1 ? 'disabled' : ''}}>
									<option value="">Seleccione Libro </option>
									@foreach ($libros as $libro)
										<option value="{{ $libro->id }}" 
											{{ $libro->id === $prestamo->libro_id ? 'selected' : '' }}>{{ $libro->nombre }}</option>
									@endforeach
								</select>
							</div>
							{{-- <div class="form-group">
								<label for="fecha_inicio">F. Inicio</label>
								<input name="fecha_inicio" class="form-control"  type="date" 
									value="{{ old('fecha_inicio',$prestamo->fecha_inicio)}}" 
									{{$prestamo->estado== 2 && auth()->id() !==1  ? 'disabled' : ''}}>
							</div> --}}
							<div class="form-group">
								<label for="fecha_fin">F. Fin</label>
								<input name="fecha_fin" class="form-control" type="date" 
									value="{{ old('fecha_fin',$prestamo->fecha_fin)}}" 
									{{$prestamo->estado== 2 && auth()->id() !==1  ? 'readonly' : ''}}>
							</div>
							
							<div class="form-group">
								<label for="descripcion">Descripción </label>
								<textarea name="descripcion" class="form-control" 
									{{$prestamo->estado== 2 && auth()->id() !==1  ? 'disabled' : ''}}></textarea>
							</div>
							@if($prestamo->estado != 2)
								<div class="row" >
									<div class="form-group mt-1">
										<div class="custom-control custom-checkbox m-3">
											<input type="checkbox" class="custom-control-input" 
												id="devuelto" name="devuelto" value="1">
											<label class="custom-control-label" for="devuelto">Devolvió Libros</label>
										</div>
									</div>
								</div>
							@endif
							<button class="btn btn-success" {{$prestamo->estado== 2 && auth()->id() !==1  ? 'disabled' : ''}}>Guardar</button>
							<a href="{{ route('prestamos.index')}}" class="btn btn-warning text-white">Volver a Listado</a>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
@endsection