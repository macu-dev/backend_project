@extends('base')
@section('header')
    @include('components.headerPage')
@stop
@section('title') Libro @endsection
@section('content')
    <h1 class="w-100 text-center mt-5">{{$post->author}}</h1>
    <article class="card mt-1 mb-3" style="width: 35%;">
        <img class="card-img-top" src="{{asset('storage').'/'.$post->image}}" alt="{{$post->title}}">
        <div class="card-body">
            <h2>{{$post->title}}</h2>
            <p>{{$post->year}}</p>
            <p class="card-text">{{$post->summary}}</p>
        </div>
    </article>
@endsection
