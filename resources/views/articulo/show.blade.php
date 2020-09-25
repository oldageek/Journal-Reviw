@extends('layouts.app')

@section('botones')
    <a href="{{ route('articulo.index') }}" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg class="icono" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>
        Volver
    </a>
@endsection

@section('content')
    <article class="contenido-articulo">
        <h1 class="text-center mb-4">{{ $articulo -> titulo }}</h1>

        <h3 class="text-left mt-3">Abstract</h3>
        <p>
            {!! $articulo -> abstract !!}
        </p>

        <div class="receta-meta mt-3">
            <p>
                <span class="font-weight-bold">Categoria :</span>
                {{ $articulo -> categoria_id }}
            </p>

            <p>
                <span class="font-weight-bold">Autor :</span>
                {{ $articulo -> user_id }}
            </p>

            <p>
                <span class="font-weight-bold">Fecha de actualizacion :</span>
                @php
                    $fecha = $articulo -> updated_at;
                @endphp

                <fecha-articulo fecha="{{ $fecha }}"></fecha-articulo>
            </p>

            <h6 class="font-weight-bold">Achivo del articulo:</h6>
            <div>
                <a class="btn btn-success" href="/storage/{{ $articulo -> archivo }}">Vizualizar Artuculo</a>
            </div>
        </div>
    </article>

    
@endsection