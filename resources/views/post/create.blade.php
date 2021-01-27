@extends('base')
@section('title') Create @endsection
@section('content')
    <h1 class="text-center fw-bold mt-3">Registrar Libro</h1>
    <form>
        <div class="form-group mb-2">
          <label for="id_autor">Id</label>
          <input type="number" class="form-control" id="id_autor" aria-describedby="id del autor" placeholder="Id del autor">
        </div>
        <div class="form-group mb-2">
          <label for="nombre_autor">Nombre</label>
          <input type="text" class="form-control" id="nombre_autor" placeholder="Nombre del autor">
        </div>

        <div class="form-group mb-2">
            <label for="titulo_libro">Título</label>
            <input type="text" class="form-control" id="titulo_libro" placeholder="Título del libro">
        </div>

        <div class="form-group mb-2">
            <label for="editorial">Editorial</label>
            <input type="text" class="form-control" id="editorial" placeholder="Editorial del libro">
        </div>

        <div class="form-group mb-3">
            <label for="anio_publicacion">Año</label>
            <input type="text" class="form-control" id="anio_publicacion" placeholder="Año de Publicación">
        </div>

        <div class="form-group mb-3">
            <label for="portada">Portada</label>
            <input type="file" class="form-control" id="portada" placeholder="Portada del libro" accept="image/x-png,image/gif,image/jpeg" />
            <img id="preview-img" src="" alt="vista previa de la imagen" />
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
@endsection

