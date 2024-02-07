@extends('layout')

@section('main-content')

<h1>Agregar Imagenes</h1>

<div class="container d-flex mb-5 p-3 bg-light w-100" style="justify-content:center">

    {{-- form --}}

    <form action="{{route('Imagenes.store')}}" method="post" enctype="multipart/form-data" class="w-100 d-flex flex-column" style="justify-content: center; align-items:center">
        @csrf
        @method('POST')

        <div class="row w-75">
            <div class="col mb-3">
                <label for="propId" class="form-label">Propiedad</label>
                <input type="text" name="propId" class="form-control w-25 text-center" value="{{$property->propId}}" disabled>
                <input type="hidden" name="propId" value="{{$property->propId}}">
            </div>
            <div class="col">
                <label for="propName" class="form-label">Propiedad Nombre</label>
                <input type="text" name="propName" class="form-control" value="{{$property->propName}}" disabled>
            </div>
        </div>

        {{-- images --}}
        <div id="imagesAdd" class="w-100">
            <div class="row w-75">
                <label for="Image[]" class="form-label">Imagen 1</label>
                <input type="file" name="image[]" class="form-control mb-3">
            </div>
        </div>
        <div class="row w-50 d-flex align-items-center justify-content-end">
            <input type="button" value=" + " class="btn btn-sm button w-25" onclick="addImageControl()">
        </div>

        {{-- end images --}}

        {{-- controls --}}
        <div class="row w-75 mt-3 d-flex gap-2" style="justify-content: flex-end">
            {{-- save --}}
            <input type="submit" value="Guardar" class="btn btn-sm button mt-5 w-25">
            {{-- cancel --}}
            <a href="{{route('Properties.index')}}" class="btn btn-sm button mt-5 w-25">Cancelar</a>
        </div>
    </form>
</div>
@endsection
