@extends('layout')
@section('main-content')

<h1>Nueva Categoria</h1>

<div class="container">

    {{-- form --}}

        <form action="{{route('Categories.store')}}" method="post">
        @csrf
        @method('POST')

        <div class="row">
            <label for="categoryId" class="form-label">ID</label>
            <input type="number" name="categoryId" class="form-control" disabled>
        </div>

        <div class="row">
            <label for="categoryName" class="form-label">Nombre</label>
            <input type="text" name="categoryName"  class="form-control" value="{{old('categoryName')}}">
            {{-- error --}}
            @error('categoryName')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- controls --}}
        <div class="row d-flex flex-column w100 gap-2" style="align-items: center; justify-content:center">
        {{-- save --}}
            <input type="submit" value="Guardar" class="btn btn-sm button mt-5 w-25">
        {{-- cancel --}}
            <a href="{{route('Categories.index')}}" class="btn btn-sm button w-25">Cancelar</a>

        </div>

        </form>

    {{-- end form --}}

</div>
@endsection
