@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="float-left font-weight-bold">Lista de Préstamos</h5>
						
						<div class="float-right">
							<form action="{{ route('prestamos.index')}}" class="float-left mr-4" method="GET" id="form-filtro">
								<select name="estado" class="form-control" onchange="document.getElementById('form-filtro').submit()">
									<option value="">Seleccione Estado</option>
									<option value="1" {{ request('estado') == 1 ? 'selected' : ''}}>Por Devolver</option>
									<option value="2"  {{ request('estado') == 2 ? 'selected' : ''}}>Devueltos</option>
								</select>
							</form>
							<a href="{{ route('prestamos.create') }}" class="btn btn-info text-white float-right"><i class="fa fa-plus"></i>Nuevo Préstamo</a>
						</div>
						
					</div>
					<div class="card-body card-block">
						<div class="table-responsive">
							<table class="table w-100 table-hover" id="tabla-prestamos">
								<thead>
									<tr>
		
										<th>Id</th>
										<th class="d-none"></th>
										<th>Usuario</th>
										<th>Alumno</th>
										<th>Libro</th>
										<th>F. Inicio</th>
										<th>F. Fin</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@forelse ($prestamos as $prestamo)
										<tr>
											<td>{{ $prestamo->id}}</td>

											<td>{{ $prestamo->usuario->nombre }}</td>
											<td class="d-none">{{ $prestamo->alumno->documento }}</td>
											<td>{{ $prestamo->alumno->nombre }}</td>
											<td>{{ $prestamo->libro->nombre }}</td>
											<td>{{ $prestamo->fecha_inicio }}</td>
											<td>{{ $prestamo->fecha_fin }}</td>
											<td>
												@if($prestamo->estado != 2)
													@if($prestamo->vencimiento())
														<span class="badge badge-pill badge-warning">Tiempo Agotado</span>
													@else 
														<span class="badge badge-pill badge-primary">Espera de Devolución</span>
													@endif
												@else 
													<span class="badge badge-pill badge-success">Devuelto</span>
												@endif
											</td>
											<td>
												@if($prestamo->estado!=2)
													<a href="{{ route('prestamos.edit', $prestamo) }}">
														<i class="fa fa-edit fs-25"></i>
													</a>
													<form action="{{ route('prestamos.devolver',$prestamo)}}" method="POST">
														@csrf @method('PUT')
														<a onclick="return eliminar(this)"
															><i class="fa fa-handshake-o fs-25 text-success"></i></a>
													</form>
												@endif
												
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