@extends('base')
@section('title') Inicio @endsection
@section('content')

    <div class="d-flex justify-content-center flex-wrap h-100 container-home">
        <h1 class="display-4 fw-bold mt-5">Sistema Bibliotecario</h1>
        <p class="lead w-100 mb-5 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

        <article class="card" style="width: 18rem;">
            <img src="{{ asset('assets/img/book-cover.jpg') }}" class="card-img-top" alt="libro">
            <div class="card-body d-flex justify-content-center">
              <a href="#" class="btn btn-primary">Registro de libros</a>
            </div>
        </article>
    </div>
@endsection
