
@extends('base')
@section('title') Inicio @endsection
@section('content')
    <table class="table mt-5 w-100">
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
                        <td>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{route("post.edit", $post->id)}}" class="w-100 d-flex btn btn-warning justify-content-center" role="button">Editar</a>
                            </div>
                            <form action="{{route("post.destroy", $post->id)}}" method="post" class="d-flex justify-content-center">
                                {{csrf_field()}}
                                {{-- LE DECIMOS EL METOOD --}}
                                {{method_field("DELETE")}}
                                <button type="submit" class="w-100 btn btn-danger" onclick="return confirm('Desea eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            @else
                <tr class="w-100">
                    <td colspan="7" class="text-center p-4">{{"No encontró resultados"}}</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
