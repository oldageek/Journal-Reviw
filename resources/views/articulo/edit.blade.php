@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css" integrity="sha512-sC2S9lQxuqpjeJeom8VeDu/jUJrVfJM7pJJVuH9bqrZZYqGe7VhTASUb3doXVk6WtjD0O4DTS+xBx2Zpr1vRvg==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{ route('articulo.index') }}" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg class="icono" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>
        Volver
    </a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Edit Article:  {{ $articulo -> titulo }}</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('articulo.update', ['articulo' => $articulo -> id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="titulo">Title</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo" placeholder="Article Title" value="{{ $articulo -> titulo }}">
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" class="form-control" id="categoria">
                        <option value="" disabled selected> --- Select some one --- </option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria -> id }}" {{ $articulo -> categoria_id == $categoria -> id ? 'selected' : '' }}>{{ $categoria -> nombre }}</option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group mt-4">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="" disabled selected> --- Select some one --- </option>
                        @foreach ($status as $statu)
                            <option value="{{ $statu -> id }}" {{ $articulo -> status_id == $statu -> id ? 'selected' : '' }}>{{ $statu -> status }}</option>
                        @endforeach
                    </select>
                    <p class="text-info">When uploading a file for the first time it always starts in the status "Waiting to accept"</p>

                    @error('status')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-5">
                    <label for="abstract">Abstract</label>
                    <input type="hidden" name="abstract" id="abstract" value="{{ $articulo -> abstract }}">
                    <trix-editor class="form-control @error('abstract') is-invalid @enderror" input='abstract'></trix-editor>
                    
                    @error('abstract')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-5">
                    <label for="archivo">Elige un archivo</label>
                    <input type="file" name="archivo" id="archivo" class="form-control @error('archivo') is-invalid @enderror">
                    
                    @error('archivo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group mt-5">
                    <label class="col">Articulo actual</label>
                    <a class="btn btn-success" href="/storage/{{ $articulo -> archivo }}">Vizualizar Artuculo</a>
                </div>

                <div class="form-group mt-5">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
@endsection