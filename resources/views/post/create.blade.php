@extends('base')
@section('title') Create @endsection
@section('content')
    <h1 class="text-center fw-bold mt-3">Registrar Libro</h1>
    {{-- la informacion sera enviada a  post store --}}
    <form action="{{route('post.store')}}" method="post">
        {{-- es una llave de seguridad cuando recibe la informacion post store, le permite el acceso si no  no podemos guardar la informacion --}}
        {{csrf_field()}}
        <div class="form-group mb-2">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" placeholder="Título del libro" name="title">
        </div>
        <div class="form-group mb-2">
          <label for="author">Autor</label>
          <input type="text" class="form-control" id="author" placeholder="Nombre del autor" name="author">
        </div>

        <div class="form-group mb-3">
            <label for="year">Año</label>
            <input type="text" class="form-control" id="year" placeholder="Año de Publicación" name="year">
        </div>

        <div class="form-group mb-2">
            <label for="summary">Resumen</label>
            <textarea class="form-control" placeholder="Resumen del libro" id="summary" cols="30" rows="10" name="summary"></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Portada</label>
            <input type="file" class="form-control" id="image" placeholder="Portada del libro" accept="image/x-png,image/gif,image/jpeg" />
            <img id="preview-img" src="" alt="vista previa de la imagen"/>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
@endsection

