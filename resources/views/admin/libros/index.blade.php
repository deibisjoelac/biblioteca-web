@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="float-left font-weight-bold">Lista de Libros</h5>
						<a href="{{ route('libros.create') }}" class="btn btn-info text-white float-right"><i class="fa fa-plus"></i>   Agregar</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table  w-100" id="tabla-libros">
								<thead>
									<tr>
										<th></th>
										<th>Id</th>
										<th>Nombre</th>
										<th>Categoria</th>
										<th>Autor</th>
										<th>Editorial</th>
										<th>Stock</th>
										<th>Número Páginas</th>
                                        <th>Descripción</th>
                                        <th>Portada</th>
                                        <th>PDF</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@forelse ($libros as $libro)
										<tr>
											<td>
												@if($libro->estado)
													<span class="badge badge-pill badge-primary">Activo</span>
												@else
													<span class="badge badge-pill badge-warning">Inactivo</span>
												@endif
											</td>
											<td>{{ $libro->id}}</td>

											<td>{{ $libro->nombre }}</td>
											<td>{{ $libro->categoria }}</td>
											<td>{{ $libro->autor}}</td>
                                            <td>{{ $libro->editorial }}</td>

											<td>
												@if($libro->stock == 0)
													<span class="badge badge-pill badge-warning">Sin Stock</span>
												@else
													{{ $libro->stock}} Unidades
												@endif
											</td>
											<td>{{ $libro->numero_paginas}} Páginas</td>
                                            <td>{{ $libro->descripcion}}</td>
                                            <td><a  href="{{ Storage::url($libro->portada) }}" target="_blank" ><img src="{{ Storage::url($libro->portada) }}" width="50" /></a></td>
                                            <td><a href="{{ Storage::url($libro->libro_pdf) }}"  target="_blank">Libro PDF</a> </td>
											<td>
												<a href="{{ route('libros.edit', $libro) }}">
													<i class="fa fa-edit fs-25"></i>
												</a>
												{{-- <form method="POST"
													action="{{ route('libros.destroy', $libro) }}"
													style="display: inline" >
													@csrf
													@method('DELETE')
													<button class="btn bg-ligth"
													>
													<i class="fa  fs-25
													{{ $libro->estado ? 'fa-trash-o  text-danger' : 'fa-check text-success'}}"></i>
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
