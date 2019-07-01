@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Modificar Usuario
					</div>
					<div class="card-body">
						@include('partials.error-messages')
						<form action="{{ route('usuarios.update', $usuario) }}" method="POST" autocomplete="off">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="form-group col-md-6">
									<label for="nombre">Nombre</label>
									<input name="nombre" class="form-control" value="{{ old('nombre',$usuario->nombre)}}" >
								</div>
								<div class="form-group col-md-6">
									<label for="telefono">Teléfono</label>
									<input name="telefono" class="form-control"  value="{{ old('telefono',$usuario->telefono)}}" >
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input name="email" class="form-control" value="{{ old('email',$usuario->email)}}"  >
								</div>
								<div class="form-group col-md-6">
									<label for="username">Usuario</label>
									<input name="username" class="form-control" value="{{ old('username',$usuario->username)}}" >
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="password">Nueva Contraseña</label>
									<input name="password" class="form-control"  type="password">
								</div>
								<div class="form-group col-md-6">
									<label for="password_confirmation">Confirmar Nueva Contraseña</label>
									<input name="password_confirmation" class="form-control"  type="password">
								</div>
							</div>
							
							<button class="btn btn-success">Guardar</button>
							<a href="{{ route('usuarios.index')}}" class="btn btn-warning">Volver a Listado</a>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
@endsection