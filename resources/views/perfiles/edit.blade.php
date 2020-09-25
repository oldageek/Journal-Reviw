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
    <h2 class="text-center mb-5">Edit Profile</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form  action="{{ route('perfiles.update', ['perfil' => $perfil -> id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="degree">Degree</label>
                    <input type="text" name="degree" class="form-control @error('degree') is-invalid @enderror" id="degree" placeholder="Article Title" value="{{ $perfil -> usuario -> degree }}">
                    @error('degree')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Article Title" value="{{ $perfil -> usuario -> name }}">
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="lastname" placeholder="Article Title" value="{{ $perfil -> usuario -> lastname }}">
                    @error('lastname')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="familyname">Family Name</label>
                    <input type="text" name="familyname" class="form-control @error('familyname') is-invalid @enderror" id="familyname" placeholder="Article Title" value="{{ $perfil -> usuario -> familyname }}">
                    @error('familyname')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="institution">Institution</label>
                    <input type="text" name="institution" class="form-control @error('institution') is-invalid @enderror" id="institution" placeholder="Article Title" value="{{ $perfil -> usuario -> institution }}">
                    @error('institution')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="acronym">Acronym</label>
                    <input type="text" name="acronym" class="form-control @error('acronym') is-invalid @enderror" id="acronym" placeholder="Article Title" value="{{$perfil -> usuario -> acronym }}">
                    @error('acronym')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="dependence">Dependence</label>
                    <input type="text" name="dependence" class="form-control @error('dependence') is-invalid @enderror" id="dependence" placeholder="Article Title" value="{{$perfil -> usuario -> dependence }}">
                    @error('dependence')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="Article Title" value="{{ $perfil -> usuario -> city }}">
                    @error('city')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" id="state" placeholder="Article Title" value="{{ $perfil -> usuario -> state }}">
                    @error('state')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" id="country" placeholder="Article Title" value="{{ $perfil -> usuario -> country }}">
                    @error('country')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Article Title" value="{{ $perfil -> usuario -> phone }}">
                    @error('phone')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Article Title" value="{{ $perfil -> usuario -> email }}">
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group mt-5">
                    <label for="biografia">Biografy</label>
                    <input type="hidden" name="biografia" id="biografia" value="{{ $perfil -> biografia }}">
                    <trix-editor class="form-control @error('biografia') is-invalid @enderror" input='biografia'></trix-editor>
                    
                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-5">
                    <label for="imagen">Image Perfil</label>
                    <input type="file" id="imagen" class="form-control @error('imagen') is-invalid @enderror" name="imagen">

                    @if ($perfil -> imagen)
                        <div class="mt-4">
                            <p>Image Now</p>
                            <img src="/storage/{{ $perfil -> imagen }}" style="width: 300px" alt="Imagen Perfil">
                        </div>
                        
                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endif
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