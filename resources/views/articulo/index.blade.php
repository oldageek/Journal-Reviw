@extends('layouts.app')

@section('botones')
    @include('ui.navegacion')
@endsection

@section('content')
    <h1 class="text-center">Administrador de Articulos</h1>

    <h3 class="text-style-bold mt-5">
        Status of submited articles
    </h3>
    <table class="table mt-3">
        <thead class="bg-secondary text-light">
            <tr class="text-center">
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date Upload</th>
                <th>Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr class="text-center">
                    <td>{{ $articulo -> titulo }}</td>
                    <td>{{ $articulo -> categoria -> nombre }}</td>
                    <td>{{ $articulo -> status -> status }}</td>
                    <td>{{ $articulo -> updated_at }}</td>
                    <td>
                        <a href="{{ route('articulo.show', ['articulo' => $articulo -> id]) }}" class="btn btn-success d-block mb-1">Ver</a>
                        <a href="{{ route('articulo.edit', ['articulo' => $articulo -> id]) }}" class="btn btn-dark d-block mb-1">Editar</a>
                        <eliminar-articulo articulo-id={{ $articulo -> id }}></eliminar-articulo>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-12 mt-4 justify-content-center d-flex">
        {{ $articulos -> Links() }}
    </div>
@endsection