@extends('layout')

@section('main-content')

<h1>Editar Imagenes</h1>

<div class="container mt-5 pt-50">

   <div class="row mt-5 pt-lg-5">
        <div class="col">
            <label for="propId" class="form-label">ID</label>
            <input type="number" name="propId" class="form-control W-25 text-center" value="{{$property->propId}}" disabled>
        </div>
        <div class="col">
            <label for="propId" class="form-label">Propiedad</label>
            <input type="text" name="propId" class="form-control w-75 text-center" value="{{$property->propName}}" disabled>
        </div>
   </div>

   <div class="d-flex mt-5 gap-2" style="align-items: flex-end; justify-content:flex-end">
    <a href="{{route('Imagenes.create',['property'=>$property->propId])}}" class="btn btn-sm button">Crear Imagenes</a>
    <a href="{{route('Properties.index')}}" class="btn btn-sm button">Cancelar</a>
   </div>

   <hr>


    {{-- images --}}

    @foreach ($images as $image)

    <div class="row d-flex flex-wrap mb-5">
        <div class="col">
            <img src="{{asset('storage/'.$image->imageName)}}" alt="{{$image->propName}}" width="400" height="200">
        </div>
        <div class="col d-grid align-items-center justify-content-end">
            <form action="{{route('Imagenes.destroy',['image'=>$image->imageId])}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger">
            </form>
        </div>
    </div>
    <hr>
    @endforeach

</div>
