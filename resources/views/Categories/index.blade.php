@extends('layout')

@section('main-content')

<div class="container">

    <h1>Categorias</h1>

    {{-- Create --}}
    <a href="{{route('Categories.create')}}" class="btn btn-sm button">Crear</a>
    <hr>

    {{-- Success --}}
    @if (session()->has('success'))
        <div id="success" class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    {{-- table --}}
    <table class="table table-stripped w-75">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Controls</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->categoryId}}</td>
                <td>{{$category->categoryName}}</td>
                {{-- controls --}}
                <td class="d-flex gap-2">
                    {{-- Edit --}}
                    <a href="{{route('Categories.edit', ['category'=>$category->categoryId])}}" class="btn btn-sm button">Editar</a>
                    {{-- Delete --}}
                    <form action="{{route('Categories.destroy', ['category'=>$category->categoryId])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
{{-- endcontainer --}}

@endsection
