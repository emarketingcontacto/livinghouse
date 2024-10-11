@extends('layout');

@section('main-content')

<div class="container">
    <h1>Contactos</h1>
    <a href="{{route('Contactos.create')}}" class="btn btn-sm button">Create</a>
    <hr>
        {{-- error --}}
        @if (session()->has('success'))
        <div id="success" class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    {{-- table --}}

    <table class="table table-stripped w-100">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Inmobiliaria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactos as $contacto)
                <tr>
                    <td>{{$contacto->contactoId}}</td>
                    <td>{{$contacto->contactoName}}</td>
                    <td>{{$contacto->contactoPhone}}</td>
                    <td>{{$contacto->contactoEmail}}</td>
                    <td>

                        <img src="{{asset('storage/'.$contacto->inmoLogo)}}" alt="{{$contacto->inmoName}}" width="60px" height="60px">

                    </td>
                    {{-- controls --}}
                    <td class="d-flex gap-2">
                        {{-- edit --}}
                        <a href="{{route('Contactos.edit', ['contacto'=>$contacto->contactoId])}}" class="btn btn-sm button">Editar</a>
                        {{-- delete --}}
                        <form action="{{route('Contactos.destroy', ['contacto'=>$contacto->contactoId])}}" method="post">
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
