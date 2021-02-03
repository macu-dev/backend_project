
@extends('base')
@section('title') Inicio @endsection
@section('content')
    <table class="table mt-5">
        <thead class="tabla-encabezado">
            <tr>
                <th>{{"Id"}}</th>
                <th class="text-center">{{"Titulo"}}</th>
                <th class="text-center">{{"Autor"}}</th>
                <th class="text-center">{{"Año"}}</th>
                <th class="text-center">{{"Resumen"}}</th>
                <th class="text-center">{{"Portada"}}</th>
                <th class="text-center">{{"Acciones"}}</th>
            </tr>
        </thead>
        <tbody>
            @if (count($posts) >=1)
                @foreach ($posts as $post)
                    <tr>
                        <td scope="row">{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->author}}</td>
                        <td>{{$post->year}}</td>
                        <td>{{$post->summary}}</td>
                        <td>{{$post->image}}</td>
                        <td><button class="w-100 mb-3 btn btn-warning">Editar</button><button class="w-100 btn btn-danger">Eliminar</button></td>
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
