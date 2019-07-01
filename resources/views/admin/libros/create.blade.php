@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Crear Libro
					</div>
					<div class="card-body">
						@include('partials.error-messages')
						<form action="{{ route('libros.store') }}" method="POST"   enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="form-group col-md-6">
									<label for="nombre">Nombre</label>
									<input name="nombre" class="form-control"  value="{{ old('nombre','')}}">
								</div>
								<div class="form-group col-md-6">
									<label for="autor">Autor</label>
									<input name="autor" class="form-control solo-letras"  value="{{ old('autor','')}}">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-6">
									<label for="categoria">Categoria</label>
									<input name="categoria" class="form-control"  value="{{ old('categoria','')}}">
								</div>
								<div class="form-group col-md-6">
									<label for="editorial">Editorial</label>
									<input name="editorial" class="form-control"  value="{{ old('editorial','')}}">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="numero_paginas">Número Páginas</label>
									<input name="numero_paginas" class="form-control solo-numeros"  type="number"  value="{{ old('numero_paginas','')}}">
								</div>
								<div class="form-group col-md-6">
									<label for="stock">Stock</label>
									<input name="stock" class="form-control solo-numeros"  type="number"  value="{{ old('stock','')}}">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-6">
									<label for="descripcion_corta">Descripción Corta</label>
									<textarea name="descripcion_corta" class="form-control">{{ old('descripcion_corta','')}}</textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="portada">Imagen Portada</label>
                                    <input name="portada" class="form-control"  type="file"  value="{{ old('portada','')}}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label for="libro_pdf">Libro PDF</label>
                                    <input name="libro_pdf" class="form-control"  type="file"  value="{{ old('libro_pdf','')}}">
                                </div>
                            </div>

							<button class="btn btn-success">Guardar</button>
							<a href="{{ route('libros.index')}}" class="btn btn-warning text-white">Volver a Listado</a>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
