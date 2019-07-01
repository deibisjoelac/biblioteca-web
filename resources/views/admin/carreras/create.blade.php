@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Crear Carrera
					</div>
					<div class="card-body">
						@include('partials.error-messages')
						<form action="{{ route('carreras.store') }}" method="POST" autocomplete="off">
							@csrf
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input name="nombre" class="form-control solo-letras" value="{{ old('nombre','')}}">
							</div>
							<div class="form-group">
								<label for="descripcion">Descripcion</label>
								<textarea name="descripcion" class="form-control">{{ old('descripcion','')}}</textarea>
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
