@extends('layouts.app')

@section('menu')
    <h1 class="my-5 text-center uppercase">Current Issue</h1>

    <div class="row mt-2">
        <div class="col-3 mx-5">
            <div class="list-group" id="lista" role="tablist">
                @foreach ($ultimos_articulos as $articulo)
                    <a href="#elem{{ $articulo -> id }}" class="list-group-item list-group-item-action" data-toggle="list" role="tab" aria-controls="elem{{ $articulo -> id }}">
                        {{-- <small class="pl-4 italic">{{ $articulo -> created_at -> diffForHumans() }}</small> --}}
                        <p class="fecha p-0 m-0">
                            <fecha-articulo fecha="{{ $articulo -> created_at }}"></fecha-articulo>
                        </p>
                         {{ $articulo -> titulo }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                @foreach ($ultimos_articulos as $articulo)
                    <div class="tab-pane fade show" id="elem{{ $articulo -> id }}" role="tabpanel" aria-labelledby="elem{{ $articulo -> id }}">
                        <h5 class="">{{ $articulo -> titulo }}</h5>
                        <p class="">{!! Str::words(strip_tags($articulo -> abstract), 15, ' ....') !!}</p>
                        <p>
                            <span class="font-weight-bold text-bold">Author: </span>
                            <a class="">{{ $articulo -> autor -> name }}</a> 
                            <a href="/storage/{{ $articulo -> archivo }}" target="_blanck" class="btn btn-dark ml-5">PDF File</a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>    
    </div>
@endsection

@section('footer-journal')
   @include('ui/footer')
@endsection

