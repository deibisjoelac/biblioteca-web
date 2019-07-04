@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <h6>Bienvenido , Al Sistema de Biblioteca </h6>
                    <hr>

                    <a href="{{ route('librosdisponibles') }}" class="btn btn-info text-white"> Ver Libros Disponibles</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
