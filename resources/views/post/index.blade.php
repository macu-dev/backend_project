@extends('base')

@section('title') Inicio @endsection
@section('content')
<table class="table mt-5 w-100">
    <thead class="tabla-encabezado">
        <tr>
            <th>{{"Id"}}</th>
            <th class="text-center">{{"Titulo"}}</th>
            <th class="text-center">{{"Autor"}}</th>
            <th class="text-center">{{"Género"}}</th>
            <th class="text-center">{{"Año"}}</th>
            <th class="text-center">{{"Resumen"}}</th>
            <th class="text-center">{{"Portada"}}</th>
            <th class="text-center">{{"Acciones"}}</th>
        </tr>
    </thead>
    <tbody class="tabla-contenido">
        @if (count($posts) >=1)
        @foreach ($posts as $post)
        <tr>
            <td scope="row">{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>{{$post->genero}}</td>
            <td>{{$post->year}}</td>
            <td>
                <p class="table-summary m-0">{{$post->summary}}</p>
            </td>
            <td><img src="{{asset('storage').'/'.$post->image}}" alt="{{$post->title}}" class="tabla-img"></td>
            <td class="acciones">
                <div class="d-flex justify-content-center mb-2">
                    <a href="{{route("post.edit", $post->id)}}"
                        class="w-100 d-flex btn btn-warning justify-content-center rounded" role="button">Editar</a>
                </div>
                <form action="{{route("post.destroy", $post->id)}}" method="post"
                    class="d-flex justify-content-center formEliminar mb-2">
                    {{csrf_field()}}
                    {{-- LE DECIMOS EL METOOD --}}
                    {{method_field("DELETE")}}
                    <button type="submit" class="w-100 btn btn-danger rounded">Eliminar</button>
                </form>

                <div class="d-flex justify-content-center">
                    <a href="{{route("post.show", $post->id)}}"
                        class="w-100 d-flex btn btn-dark justify-content-center rounded" role="button">Ver detalles</a>
                </div>
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@if (session('eliminar') === 'ok')
<script>
    Swal.fire(
        '¡Ha sido eliminado exitosamente!',
        'success'
    )

</script>

@endif
<script>
    const formularioEliminar = document.querySelectorAll('.formEliminar');

    let aprobarEliminacion = (e) => {
        e.preventDefault();
        Swal.fire({
            title: '¿Deseas eliminar este elemento?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        })
    }


    if (formularioEliminar.length > 0) {
        for (let i = 0; i < formularioEliminar.length; i++) {
            formularioEliminar[i].addEventListener('submit', aprobarEliminacion)
        }
    }

</script>
@endsection
