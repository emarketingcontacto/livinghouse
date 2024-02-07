@extends('layout');

@section('main-content')

<div class="container">

    <h1>Usuarios</h1>

    {{-- Success --}}
    @if (session()->has('success'))
        <div id="success" class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    {{-- Create --}}
    <a href="{{route('User.create')}}" class="btn btn-sm button">Crear</a>
    <hr>
    {{-- table --}}
    <table class="table table-stripped w-100 mb-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Alias</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Status</th>
                <th class="text-center">Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->status}}</td>
                    <td class="d-flex gap-2 justify-content-center">
                        {{-- Edit --}}
                        <a href="{{route('User.edit',['user'=>$user])}}" class="btn btn-sm button">Editar</a>
                        {{-- Delete --}}
                        <form action="{{route('User.destroy', ['user'=>$user])}}" method="post">
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
