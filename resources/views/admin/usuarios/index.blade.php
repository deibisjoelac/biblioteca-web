@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">
						<h5 class="float-left font-weight-bold">Lista de Usuarios</h5>
						<a href="{{ route('usuarios.create') }}" class="btn btn-info text-white float-right"><i class="fa fa-plus"></i>   Agregar</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table w-100" id="tabla-usuarios">
								<thead>
									<tr>
										<th>Id</th>
										<th>Nombre</th>
										<th>Teléfono</th>
										<th>Email</th>
										<th>Usuario</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@forelse ($usuarios as $usuario)
										<tr>
											<td>{{ $usuario->id}}</td>
											<td>{{ $usuario->nombre }}</td>
											<td>{{ $usuario->telefono}}</td>
											<td>{{ $usuario->email}}</td>
											<td>{{ $usuario->username}}</td>
											<td>
												<a href="{{ route('usuarios.edit', $usuario) }}">
													<i class="fa fa-edit fs-25"></i>
												</a>
												{{-- <form method="POST"
													action="{{ route('usuarios.destroy', $usuario) }}"
													style="display: inline" >
													@csrf
													@method('DELETE')
													<button class="btn bg-ligth"
													>
													<i class="fa  fs-25
													{{ $usuario->estado ? 'fa-trash-o  text-danger' : 'fa-check text-success'}}"></i>
													</button>
												</form> --}}
											</td>
										</tr>
									@empty
										
									@endforelse
								</tbody>
							</table>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
@endsection