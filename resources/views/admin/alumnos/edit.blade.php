@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Modificar Alumno
					</div>
					<div class="card-body">
						@include('partials.error-messages')
						<form action="{{ route('alumnos.update', $alumno) }}" method="POST" autocomplete="off">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="form-group col-md-6">
									<label for="carrera_id">Carrera</label>
									<select name="carrera_id" class="form-control" >
										<option value="">Seleccione Carrera</option>
										@foreach ($carreras as $carrera)
											<option value="{{ $carrera->id }}"
												{{ $carrera->id === $alumno->carrera_id ? 'selected' : ''}}>{{ $carrera->nombre }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="documento">Documento</label>
									<input name="documento" class="form-control solo-numeros" value="{{ old('documento',$alumno->documento)}}" maxlength="8" >
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-6">
									<label for="nombre">Nombre</label>
									<input name="nombre" class="form-control solo-letras" value="{{ old('nombre',$alumno->nombre)}}" >
								</div>
								<div class="form-group col-md-6">
									<label for="telefono">Teléfono</label>
									<input name="telefono" class="form-control solo-numeros"  value="{{ old('telefono',$alumno->telefono)}}" maxlength="9"  >
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input name="email" class="form-control" value="{{ old('email',$alumno->email)}}"  >
								</div>
								<div class="form-group col-md-6">
									<label for="direccion">Dirección</label>
									<textarea name="direccion" class="form-control">{{ old('direccion',$alumno->direccion)}}</textarea>
								</div>
							</div>

							<button class="btn btn-success">Guardar</button>
							<a href="{{ route('alumnos.index')}}" class="btn btn-warning">Volver a Listado</a>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
