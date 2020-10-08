@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('menu')
    <header>
        <div class="contenedor">
            <nav class="menu">
                <a href="#" id="btn-acerca-de">Home</a>
                <a href="{{ route('inicio.issue') }}" id="btn-menu">Current Issue</a>
                <a href="#" id="btn-galeria">Editorial Board</a>
                <a href="#" id="btn-ubicacion">Indexing</a>
                <a href="{{ route('inicio.privacy') }}" id="btn-ubicacion">Privacy Policy</a>
            </nav>

            <div class="textos">
                <h1 class="nombre">Mexican <span>Journal</span></h1>
                <h3>The Mexican Journal of Materials Science and Engineering (MJMSE)</h3>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="container nuevos-articulos">
        <h2 class="titulo-categoria mb-4">About The Journal</h2>
        <div class="row pb-4">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <img class="portada" src="{{ asset('images/portada.png') }}" alt="">
            </div>
            <div class="col col-md-6 order-1 order-md-2 mt-0">
                <h2 class="text-center mb-3">Mexican Journal</h2>
                <p class="text-justify">
                    The Mexican Journal of Materials Science and Engineering (MJMSE) is intended as a new forum for spreading the scientific achievements in the field of materials science and engineering of Mexican researchers. This peer-review journal is devoted to publish original research articles related with synthesis, characterization, microstructure processing, applications, theory and computational studies of materials. The MJMSE will be published on-line three times a year and without cost to publish electronically. All authors retain copyrigh, this situation allows authors to distribute the material more convenient.
                    <br><br>
                    The content is available immediately after its publication, without delays or embargoes and the download of manuscripts published by the Mexican Journal of Materials Science and Engineering is free and open access, only requires the source is cited.
                    <br><br>
                    The Mexican Journal of Materials Science and Engineering is an electronic journal supported by Faculty of Physics of the Benemérita Universidad Autonóma de Puebla, represented by Miguel Camacho Téllez; email: camacho@ifuap.buap.mx and developed by Omar Hernandez Sarmiento; email: omar.350.hs@gmail.com.
                </p>
            </div>
        </div>

        <div class="row my-5">
            <div class="col">
                <h2 class="titulo-categoria mb-4">Chiefs</h2>

                <h4>Editor-in-Chief</h4>
                <p class="mb-0">Dr. Ernesto Chigo Anota, Benemérita Universidad Autónoma de Puebla.</p>
                <a href="#">ernesto.chigo@correo.buap.mx</a>

                <h4 class="mt-5">Associate Editors</h4>
                <p class="mb-0">Dr. Gabriel Murrieta Hernández, Universidad Autónoma de Yucatán.</p>
                <a href="#">murrieta@correo.uady.mx</a>

                <p class="mb-0 mt-3">Dr. Alejandro Escobedo Morales, Benemérita Universidad Autónoma de Puebla.</p>
                <a href="#">alejandro.escobedo@correo.buap.mx</a>

                <p class="mb-0 mt-3">Dr. Heriberto Hernández Cocoletzi, Benemérita Universidad Autónoma de Puebla.</p>
                <a href="#">kokil44@gmail.com</a>
            </div>
        </div>

        <h2 class="titulo-categoria my-4 ">New Articles</h2>
        <div class="owl-carousel owl-theme mb-2">
            @foreach ($nuevas as $nueva)
                <div class="card item">
                    <img src="/storage/upload-default/pdf.jpeg" class="card-img-top" alt="Archivo PDF">

                    <div class="card-body">
                        <h4>{{ Str::upper($nueva -> titulo) }}</h4>
                        <p>{!! Str::words(strip_tags($nueva -> abstract), 10, ' ....') !!}</p>
                        <a href="{{ route('articulo.show', ['articulo' => $nueva -> id]) }}" class="btn btn-outline-dark d-block font-weight-bold text-uppercase">View</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row my-5">
            <div class="col">
                <h2 class="titulo-categoria mb-4">Cintillo Legal</h2>
                <p class="text-bold text-justify">
                    Mexican Journal of Materials Science and Engineering, Año (1,2,3,4,5,6) Volumen (1,2,3,4,5,6), (enero-abril 2014, mayo–agosto 2014, septiembre-diciembre 2014, enero-abril 2015, mayo-agosto 2015, septiembre-diciembre 2015, enero-abril 2016, mayo–agosto 2016, septiembre-diciembre 2016, enero-abril 2017, mayo–agosto 2017, septiembre-diciembre 2017, enero-abril 2018, mayo–agosto 2018, septiembre-diciembre 2018, enero-abril 2019), revista electrónica, es una publicación cuatrimestral editada por la Benemérita Universidad Autónoma de Puebla, a través de la Facultad de Ingeniería Química, Ciudad Universitaria, Edificio 106H, Av. Sn. Claudio y 18 sur Col. Jardines de San Manuel, CP. 72570 Puebla, Puebla. Tel. (222) 2295500, ext. 7252, Puebla, Puebla, México, Tel. , <a href="http://intranet.matematicas.uady.mx/mjmatse/index.php"> http://intranet.matematicas.uady.mx/mjmatse/index.php.</a> <br> <br>
                    Editor responsable, Dr. Ernesto Chigo Anota, reserva del derecho al uso exclusivo 04-2014-112810583900-203, ISSN 2395-9630, ambos otorgados por el Instituto Nacional del Derecho de Autor. Responsable de la última actualización, Dr. Gabriel Murrieta Hernández con domicilio en Periférico Norte, Tablaje 13615, junto al local del FUTV, Mérida, Yucatán, México, Tel. 999 942 31 40 al 49. <br> <br>
                    Fecha de la última modificación: 10 de Julio de 2019. Las opiniones expresadas por los autores no necesariamente reflejan la postura del editor. Queda totalmente prohibida la reproducción total o parcial de los contenidos e imágenes de la publicación sin previa autorización de la dirección de la Facultad de Ingeniería Química de la Benemérita Universidad Autónoma de Puebla. <br> <br>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('footer-journal')
    <div class="col d-flex justify-content-center">
        <p class="text-center p-3">
            © 2017 All rights reserved Mexican Journal of Materials Science and Engineering.<br>
            This page may be reproduced for non-profit purposes, provided it does not mutilate, cite the complete source and its electronic address,<br>
            otherwise requires prior written permission of the institution.
        </p>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('vendor/js/efectos.js') }}"></script>
    <script src="{{ asset('vendor/js/parallax.js') }}"></script>
@endsection