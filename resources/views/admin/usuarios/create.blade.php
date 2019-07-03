@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Crear Usuario
					</div>
					<div class="card-body">
						@include('partials.error-messages')
						<form method="POST" action="{{ route('usuarios.store') }}">
							@csrf
							<div class="row">
								<div class="form-group col-md-6">
									<label for="nombre">Nombre</label>
									<input name="nombre" class="form-control" value="{{ old('nombre','')}}"  >
								</div>
								<div class="form-group col-md-6">
									<label for="telefono">Teléfono</label>
									<input name="telefono" class="form-control solo-numeros"   value="{{ old('telefono','')}}"   maxlength="9">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input name="email" class="form-control" value="{{ old('email','')}}" >
								</div>
								<div class="form-group col-md-6">
									<label for="username">Usuario</label>
									<input name="username" class="form-control"  value="{{ old('username','')}}" >
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

							<div class="form-group row mb-0">
								<div class="col-md-6 ">
									<button type="submit" class="btn btn-success">
										{{ __('Register') }}
									</button>
									<a href="{{ route('usuarios.index')}}" class="btn btn-warning">Volver a Listado</a>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
