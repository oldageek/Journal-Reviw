@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-5">Indexing Information</h2>

    <div class="row m-3 indexing">
        <a href="https://scholar.google.es/citations?user=HJfA828AAAAJ" target="_blank">Google Scholar</a>
    </div>
    <div class="row m-3 indexing">
        <a href="https://www.latindex.org/latindex/ficha?folio=24877" target="_blank">Latindex</a>
    </div>
    <div class="row m-3 indexing">
        <a href="https://doaj.org/toc/2395-9630?source=%7B%22query%22%3A%7B%22filtered%22%3A%7B%22filter%22%3A%7B%22bool%22%3A%7B%22must%22%3A%5B%7B%22terms%22%3A%7B%22index.issn.exact%22%3A%5B%222395-9630%22%5D%7D%7D%2C%7B%22term%22%3A%7B%22_type%22%3A%22article%22%7D%7D%5D%7D%7D%2C%22query%22%3A%7B%22match_all%22%3A%7B%7D%7D%7D%7D%2C%22size%22%3A100%2C%22_source%22%3A%7B%7D%7D" target="_blank">DOAJ</a>
    </div>
    <div class="row m-3 indexing">
        <a href="http://periodica.unam.mx/F?func=find-b-0&local_base=per01" target="_blank">PERIODICA</a>
    </div>
@endsection
