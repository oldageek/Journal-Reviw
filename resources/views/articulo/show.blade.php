@extends('layouts.app')


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
                {{ $articulo -> categoria -> nombre }}
            </p>

            <p>
                <span class="font-weight-bold">Autor :</span>
                {{ $articulo -> autor -> name }}
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