@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Crear Alumno
					</div>
					<div class="card-body">
						@include('partials.error-messages')
						<form action="{{ route('alumnos.store') }}" method="POST" autocomplete="off">
							@csrf
							<div class="row">
								<div class="form-group col-md-6">
									<label for="carrera_id">Carrera</label>
									<select name="carrera_id" class="form-control" >
										<option value="">Seleccione Carrera</option>
										@foreach ($carreras as $carrera)
											<option value="{{ $carrera->id }}"
													{{ (old('carrera_id') == $carrera->id) ? 'selected': ''}}>{{ $carrera->nombre }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="documento">Documento</label>
									<input name="documento" class="form-control solo-numeros" value="{{ old('documento','')}}"
                                         maxlength="8" >
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="nombre">Nombre</label>
									<input name="nombre" class="form-control solo-letras"  value="{{ old('nombre','')}}"
                                        id="nombre" maxlength="100">
								</div>
								<div class="form-group col-md-6">
									<label for="telefono">Teléfono</label>
									<input name="telefono" class="form-control solo-numeros"  value="{{ old('telefono','')}}"
                                         maxlength="9">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input name="email" class="form-control"  value="{{ old('email','')}}" type="email" >
								</div>
								<div class="form-group col-md-6">
									<label for="direccion">Dirección</label>
									<textarea name="direccion" class="form-control"> {{ old('direccion','')}}</textarea>
								</div>
							</div>

							<button class="btn btn-success">Guardar</button>
							<a href="{{ route('alumnos.index')}}" class="btn btn-warning text-white" >Volver a Listado</a>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection

