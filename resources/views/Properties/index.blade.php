@extends('layout');

@section('main-content')

<div class="container">
    <h1>Propiedades</h1>
    {{-- create --}}
    <a href="{{route('Properties.create')}}" class="btn btn-sm button">Create</a>
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
                <th>Inmobiliaria</th>
                <th>Categoria</th>
                <th>Construcción(m2)</th>
                <th>Terreno(m2)</th>
                <th>Baños</th>
                <th>Recamaras</th>
                <th>Jardín</th>
                <th>Colonia</th>
                <th>Estado</th>
                <th>Vigilancia</th>
                <th>Precio</th>
                <th class="text-center">Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{$property->propId}}</td>
                    <td>{{$property->propName}}</td>
                    <td>
                        <img src="{{asset('storage/'.$property->inmoLogo)}}" alt="{{$property->inmoLogo}}" width="50px" height="50px"></td>
                    {{-- <td>{{$property->inmoId}}</td> --}}
                    <td>{{$property->categoryName}}</td>

                    <td>{{$property->propBuilt}}</td>
                    <td>{{$property->propTerrain}}</td>

                    <td class="text-center">{{$property->propBaths}}</td>
                    <td class="text-center">{{$property->propBedroom}}</td>
                    <td class="text-center">
                        @if ($property->propGarden === 1) {{'Si'}} @else {{'No'}} @endif </td>
                    <td>{{$property->propNeighborhood}}</td>
                    <td>{{$property->propState}}</td>
                    <td class="text-center"> @if ($property->propSurveillance == 1) {{'Si'}} @else {{'No'}} @endif </td>
                    <td>{{$property->propPrice}}</td>
                    {{-- controls --}}
                    <td class="d-flex gap-2">
                        {{-- edit --}}
                        <a href="{{route('Properties.edit', ['property'=>$property->propId])}}" class="btn btn-sm button">Editar</a>
                        {{-- delete --}}
                        <form action="{{route('Properties.destroy', ['property'=>$property->propId])}}" method="post">
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
