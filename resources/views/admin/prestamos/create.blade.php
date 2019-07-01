@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Crear Nuevo Préstamo
					</div>
					<div class="card-body">
						@include('partials.error-messages')
						<form action="{{ route('prestamos.store') }}" method="POST" autocomplete="off">
							@csrf
							<div class="row">
								<div class="form-group col-md-6">
									<label for="alumno_id">Alumno *</label>
									<select name="alumno_id" class="form-control" >
										<option value="">Seleccione Alumno</option>
										@foreach ($alumnos as $alumnos)
											<option value="{{ $alumnos->id }}" 
												{{ (old('alumno_id') == $alumnos->id) ? 'selected': ''}}>{{ $alumnos->nombre }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="libro_id">Libro *</label>
									<select name="libro_id" class="form-control" >
										<option value="">Seleccione Libro </option>
										@foreach ($libros as $libro)
											<option value="{{ $libro->id }}"
												{{ (old('libro_id') == $libro->id) ? 'selected': ''}}>{{ $libro->nombre }}</option>
										@endforeach
									</select>
								</div>
							</div>
							
							{{-- <div class="form-group">
								<label for="fecha_inicio">F. Inicio</label>
								<input name="fecha_inicio" class="form-control"  type="date" value="{{ old('fecha_inicio','')}}" >
							</div> --}}
							<div class="row">
								<div class="form-group col-md-6">
									<label for="fecha_fin">F. Fin</label>
									<input name="fecha_fin" class="form-control" type="date" value="{{ old('fecha_fin','')}}">
								</div>
							</div>
							
							<div class="row">
								<div class="form-group col-md-10">
									<label for="descripcion">Descripción </label>
									<textarea name="descripcion" class="form-control">{{ old('descripcion','')}}</textarea>
								</div>
							</div>
							
							<button class="btn btn-success">Guardar</button>
							<a href="{{ route('prestamos.index')}}" class="btn btn-warning text-white">Volver a Listado</a>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
@endsection