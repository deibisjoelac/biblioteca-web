@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">
						<h5 class="float-left font-weight-bold">Lista de Carreras</h5>
						<a href="{{ route('carreras.create') }}" class="btn btn-info text-white float-right"><i class="fa fa-plus"></i>   Agregar</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table w-100" id="tabla-carreras">
								<thead>
									<tr>
										<th></th>
										<th>Id</th>
										<th>Nombre</th>
										<th>Descripción</th>
										<th>F. Creación</th>
										<th>F. Actualización</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($carreras as $carrera)
										<tr>
											<td>
												@if($carrera->estado)
													<span class="badge badge-pill badge-primary">Activo</span>
												@else
													<span class="badge badge-pill badge-warning">Inactivo</span>
												@endif
											</td>
											<td>{{ $carrera->id}}</td>
											<td>{{ $carrera->nombre }}</td>
											<td>{{ $carrera->descripcion }}</td>
											<td>{{ $carrera->created_at}}</td>
											<td>{{ $carrera->updated_at}}</td>
											<td>
												<a href="{{ route('carreras.edit', $carrera) }}">
													<i class="fa fa-edit fs-25"></i>
												</a>
												<form method="POST"
													action="{{ route('carreras.destroy', $carrera) }}"
													style="display: inline" >
													@csrf
													@method('DELETE')
													<button class="btn bg-ligth"
													>
													<i class="fa  fs-25
													{{ $carrera->estado ? 'fa-trash-o  text-danger' : 'fa-check text-success'}}"></i>
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