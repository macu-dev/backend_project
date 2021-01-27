
@extends('base')
@section('title') Inicio @endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{"Id"}}</th>
                <th>{{"Titulo"}}</th>
                <th>{{"Autor"}}</th>
                <th>{{"Acciones"}}</th>
            </tr>
        </thead>
        <tbody>
            @if (count($posts) >=1)
                @foreach ($posts as $post)
                    <tr>
                        <td scope="row">{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->author}}</td>
                        <td>{{$post->author}}</td>
                        <td><button>Editar</button><button>Eliminar</button></td>
                    </tr>

                @endforeach
            @else
                <tr>
                    <td>{{"No encontró resultados"}}</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
