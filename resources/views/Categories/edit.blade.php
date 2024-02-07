@extends('layout')
@section('main-content')

<h1>Editar Categoria</h1>

<div class="container">

    {{-- form --}}

        <form action="{{route('Categories.update', ['category'=>$category])}}" method="post">
        @csrf
        @method('PUT')

        <div class="row">
            <label for="categoryId" class="form-label">ID</label>
            <input type="number" name="categoryId" class="form-control" disabled value="{{$category->categoryId}}">
        </div>

        <div class="row">
            <label for="categoryName" class="form-label">Nombre</label>
            <input type="text" name="categoryName"  class="form-control" value="{{$category->categoryName}}">
            {{-- error --}}
            @error('categoryName')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

            {{-- controls --}}
            <div class="row d-flex flex-column w100" style="align-items: center; justify-content:center">
            {{-- save --}}
                <input type="submit" value="Guardar" class="btn btn-sm button mt-5 w-25">
            {{-- cancel --}}
                <a href="{{route('Categories.index')}}" class="btn btn-sm btn-cancel w-25">Cancel</a>
            </div>
        </form>

    {{-- end form --}}

</div>
@endsection
