@extends('layout')

@section('main-content')

<div class="container">
    <h1>Tipos de negocio</h1>
    <a href="{{route('Biztype.create')}}" class="btn btn-sm button">Create</a>
    <hr>
    @if (session()->has('success'))
        <div id="success" class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <table class="table table-stripped w-75">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($biztypes as $biztype)
        <tr>
            <td>{{$biztype->biztypeId}}</td>
            <td>{{$biztype->biztypeName}}</td>
            <td class="d-flex gap-2">
                <a href="{{route('Biztype.edit', ['biztype'=>$biztype->biztypeId])}}" class="btn btn-sm button">Editar</a>
                <form action="{{route('Biztype.destroy', ['biztype'=>$biztype])}}" method="post">
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

@endsection
