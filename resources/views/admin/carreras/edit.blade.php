@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Modificar Carrera
					</div>
					<div class="card-body">
						@include('partials.error-messages')
						<form action="{{ route('carreras.update', $carrera) }}" method="POST" autocomplete="off">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input name="nombre" class="form-control solo-letras"
									value="{{ old('nombre',$carrera->nombre)}}" >
							</div>
							<div class="form-group">
								<label for="descripcion">Descripcion</label>
							<textarea name="descripcion"
								class="form-control">{{ old('descripcion',$carrera->descripcion)}}</textarea>
							</div>
							<button class="btn btn-success">Guardar</button>
							<a href="{{ route('carreras.index')}}" class="btn btn-warning">Volver a Listado</a>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
