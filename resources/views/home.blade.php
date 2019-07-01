@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bienvenido ,  {{ auth()->user()->nombre}} </h5>
                    <hr>
                    <h6>A Continuación , El Listado de Libros registrados en el Sistema</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        @foreach ($libros as $libro)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        {{ $libro->nombre}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h6><strong>Categoria : </strong>  {{ $libro->categoria}}</h6>
                                <h6><strong>Autor : </strong>  {{ $libro->autor}}</h6>
                                <h6><strong>Editorial : </strong>  {{ $libro->editorial}}</h6>
                                <hr>
                                <h6><strong>  {{ $libro->numero_paginas }} Páginas  </strong></h6>
                                <hr>
                                <h6><strong>Descripción : </strong>  {{ $libro->descripcion_corta}}</h6>
                            </div>
                            <div class="col-md-3">
                                <img src="{{ Storage::url($libro->portada) }}" width="120" />
                                <hr>
                                <a href="{{ Storage::url($libro->libro_pdf) }}"  target="_blank">Libro PDF</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
            
        </div>
</div>
@endsection
