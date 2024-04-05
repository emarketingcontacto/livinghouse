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
                <th>Categoria</th>
                <th>Ubicación</th>
                <th>Frente</th>
                <th>Profundidad</th>
                <th>Total</th>
                <th>Baños</th>
                <th>Recamaras</th>
                <th>Estacionamiento</th>
                <th>Jardín</th>
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
                    <td>{{$property->categoryName}}</td>
                    <td>{{$property->propFront}}</td>
                    <td>{{$property->propDepth}}</td>
                    <td>{{$property->propTotal}}</td>
                    <td class="text-center">{{$property->propBaths}}</td>
                    <td class="text-center">{{$property->propBedroom}}</td>
                    <td class="text-center">{{$property->propParking}}</td>
                    <td class="text-center">
                        @if ($property->propGarden === 1) {{'Si'}} @else {{'No'}} @endif </td>
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
