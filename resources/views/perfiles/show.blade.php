@extends('layouts.app')

@section('content')
    {{-- {{ $perfil }} --}}
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if ($perfil -> imagen)
                    <img src="/storage/{{ $perfil -> imagen }}" class="w-100 rounded-circle" alt="Imagen Autor">
                @endif
            </div>
            <div class="col-md-7">
                <h2 class="text-center my-5 text-primary">Author: {{ $perfil -> usuario -> name }}</h2>
                <p class="mt-2 mb-2 text-bold">Last Name: {{ $perfil -> usuario -> lastname }}</p>
                <p class="mt-2 mb-2 text-bold">Family Name: {{ $perfil -> usuario -> familyname }}</p>
                <p class="mt-2 mb-2 text-bold">Degree: {{ $perfil -> usuario -> degree }}</p>
                <p class="mt-2 mb-2 text-bold">Institution: {{ $perfil -> usuario -> institution }}</p>
                <p class="mt-2 mb-2 text-bold">Dependence: {{ $perfil -> usuario -> dependence }}</p>
                <p class="mt-2 mb-2 text-bold">Country: {{ $perfil -> usuario -> country }}</p>
                <p class="mt-2 mb-2 text-bold">Email: {{ $perfil -> usuario -> email }}</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col mt-5 mt-md-0">
                <p>
                    {!! $perfil -> biografia !!}
                </p>
            </div>
        </div>

    </div>

    <h2 class="text-center my-5">Articles created by {{ $perfil -> usuario -> name }}</h2>

    <div class="container">
        <div class="row mx-auto bg-white p-4">
            @if (count($articulos) > 0)
                @foreach ($articulos as $articulo)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/storage/upload-default/pdf.jpeg" class="card-img-top" alt="Archivo PDF">
                            <div class="card-body">
                                <h4>{{ $articulo -> titulo }}</h4>
                                <a href="{{ route('articulo.show', ['articulo' => $articulo -> id]) }}" class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold">View Article</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center w-100">No hay articulos aun ......</p>
            @endif
        </div>

        <div class="d-flex justify-content-center">
            {{ $articulos -> Links() }}
        </div>
    </div>
@endsection