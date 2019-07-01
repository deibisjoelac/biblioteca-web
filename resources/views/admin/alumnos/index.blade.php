@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="float-left font-weight-bold">Lista de Alumnos</h5>
						<a href="{{ route('alumnos.create') }}" class="btn btn-info text-white float-right"><i class="fa fa-plus"></i>   Agregar</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table w-100" id="tabla-alumnos">
								<thead>
									<tr>
										<th></th>
										<th>Id</th>
										<th>Carrera</th>
										<th>Documento</th>
										<th>Nombre</th>
										<th>Teléfono</th>
										<th>Email</th>
										<th>Dirección</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@forelse ($alumnos as $alumno)
										<tr>
											<td>
												@if($alumno->estado)
													<span class="badge badge-pill badge-primary">Activo</span>
												@else
													<span class="badge badge-pill badge-warning">Inactivo</span>
												@endif
											</td>
											<td>{{ $alumno->id}}</td>
											<td>{{ $alumno->carrera->nombre }}</td>
											<td>{{ $alumno->documento }}</td>
											<td>{{ $alumno->nombre }}</td>
											<td>{{ $alumno->telefono}}</td>
											<td>{{ $alumno->email}}</td>
											<td>{{ $alumno->direccion}}</td>
											<td>
												<a href="{{ route('alumnos.edit', $alumno) }}">
													<i class="fa fa-edit fs-25"></i>
												</a>
												<form method="POST"
													action="{{ route('alumnos.destroy', $alumno) }}"
													style="display: inline" >
													@csrf
													@method('DELETE')
													<button class="btn bg-ligth"
													>
													<i class="fa  fs-25
													{{ $alumno->estado ? 'fa-trash-o  text-danger' : 'fa-check text-success'}}"></i>
													</button>
												</form>
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