@extends('layout')
@section('main-content')
<h1>Nueva Inmobiliaria</h1>
<div class="form-container">



    {{-- form --}}

    <form action="{{route('Inmobiliarias.store')}}" method="post" enctype="multipart/form-data" class="w-50">
        @csrf
        @method('POST')
        {{-- Id --}}
        <div class="row">
            <div class="col">
                <label for="Id" class="form-label">Id</label>
                <input type="number" name="inmoId" class="form-control" disabled>
            </div>
        </div>


        {{-- nombre --}}
        <div class="row">
            <div class="col">
                <label for="inmoName" class="form-label">Nombre</label>
                <input type="text" name="inmoName" class="form-control" value="{{old('inmoName')}}" >
                @error('inmoName')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{--Logo --}}
        <div class="row">
            <div class="col">
                <label for="inmoLog" class="form-label">Logo</label>
                <input type="file" name="inmoLogo" class="form-control" value="{{old('inmoLogo')}}" >
                @error('inmoLogo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- website --}}
        <div class="row">
            <div class="col">
                <label for="inmoWeb" class="form-label">Website</label>
                <input type="url" name="inmoWeb" class="form-control" value="{{old('inmoWeb')}}">
                @error('inmoWeb')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- direccion --}}
        <div class="row">
            <div class="col">
                <label for="inmoAddress" class="form-label">Dirección</label>
                <input type="text" name="inmoAddress" class="form-control" value="{{old('inmoAddress')}}">
                @error('inmoAddress')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- controls --}}

        <div class="row form-controls">
            {{-- save --}}
            <input type="submit" value="Guardar" class="btn btn-sm button w-25">
            {{-- cancel --}}
            <a href="{{route('Inmobiliarias.index')}}" class="btn btn-sm btn-danger w-25">Cancelar</a>
        </div>

    </form>
</div>

@endsection
