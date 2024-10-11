@extends('layout')

@section('main-content')

<h1>Nuevo Contacto</h1>

<div class="container form-container">


{{-- form --}}
<form action="{{route('Contactos.store')}}" method="post" class="w-50">
    @csrf
    @method('POST')

    <div class="row">
        <div class="col">
            <label for="contactoId" class="form-label" >ID</label>
            <input type="text" name="contactoId"  class="form-control" disabled>
        </div>
        @error('contactoId')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col">
            <label for="contactoName" class="form-label">Nombre</label>
            <input type="text" name="contactoName" class="form-control">
        </div>
        @error('contactoName')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col">
            <label for="contactoPhone" class="form-label">Teléfono</label>
            <input type="phone" type="phone" name="contactoPhone" class="form-control">
        </div>
        @error('contactoPhone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col">
            <label for="contactoEmail" class="form-label">Email</label>
            <input type="mail" name="contactoEmail" class="form-control">
        </div>
        @error('contactoEmail')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- Inmobiliaria --}}
    <div class="row">
        <div class="col">
            <label for="inmoId" class="form-label">Inmobiliaria</label>
            <select name="inmoId" class="form-control dropdown w-100 text-center">
                <option value="">Elegir Opción</option>
                @foreach ($inmobiliarias as $inmobiliaria)
                    <option value="{{$inmobiliaria->inmoId}}"{{$inmobiliaria->inmoId===old('inmoId'? 'selected':'')}}>{{$inmobiliaria->inmoName}}</option>
                @endforeach
            </select>
        </div>
        @error('inmoId')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- controls --}}

    <div class="form-controls">
        {{-- save --}}
        <input type="submit" value="Guardar" class="btn btn-sm button">
        {{-- cancel --}}
        <a href="{{route('Contactos.index')}}" class="btn btn-sm btn-danger">Cancelar</a>

    </div>

</form>


</div>


@endsection

