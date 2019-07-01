@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
				<div class="card-header">
					<h5 class="float-left font-weight-bold">Consulta - Préstamos por Libro</h5>
				</div>
                <div class="card-body">
					<form action="{{ route('consultas.index')}}" method="GET" id="form-consulta">
						<div class="form-group">
							<label for="libro">Libro a Consultar</label>
							<select name="libro" class="form-control" onchange="document.getElementById('form-consulta').submit()">
								<option value="">Seleccione el Libro</option>
								@foreach ($libros as $libro)
									<option value="{{ $libro->id}}" 
										{{ $libro->id == request('libro') ? 'selected' : ''}}>{{ $libro->nombre}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="alumno">Alumno a Consultar</label>
							<select name="alumno" class="form-control" onchange="document.getElementById('form-consulta').submit()">
								<option value="">Seleccione el Alumno</option>
								@foreach ($alumnos as $alumno)
									<option value="{{ $alumno->id}}" 
										{{ $alumno->id == request('alumno') ? 'selected' : ''}}>{{ $alumno->nombre}}</option>
								@endforeach
							</select>
						</div>
						@if($prestamos)
							@if($libroSelect)
								<div class="alert alert-warning alert-dismissible fade show mb-4 role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
										<h6 ><strong> EL Libro  {{ $libroSelect->nombre}} , tiene registrado  {{ count($prestamos)}} préstamos</strong> </h6>
								</div>
								<div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h6 > <strong> EL Libro {{ $libroSelect->nombre}} , tiene actualmente {{ $libroSelect->stock}} Unidades en Stock</strong> </h6>
								</div>
							@endif
						@endif
					
					</form>
                </div>
            </div>
		</div>
		@if($prestamos)
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h5 class="float-left font-weight-bold">Lista de Préstamos</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table w-100" id="tabla-reporte-libros-prestamos">
								<thead>
									<tr>
										<th>Id</th>	
										<th>Usuario</th>
                                        <th>Alumno</th>
                                        <th>Libro</th>
										<th>F. Inicio</th>
										<th>F. Fin</th>
										<th>F. Devolución</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($prestamos as $prestamo)
										<tr>
											<td>{{ $prestamo->id}}</td>
											<td>{{ $prestamo->usuario->nombre }}</td>
                                            <td>{{ $prestamo->alumno->nombre }}</td>
                                            <td>{{ $prestamo->libro->nombre }}</td>
											<td>{{ $prestamo->fecha_inicio }}</td>
											<td>{{ $prestamo->fecha_fin }}</td>
											<td>{{ $prestamo->fecha_devolucion }}</td>
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
										</tr>
									@empty
										
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		@endif
    </div>
</div>
@endsection
