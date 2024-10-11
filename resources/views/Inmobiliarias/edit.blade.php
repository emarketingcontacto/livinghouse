@extends('layout')
@section('main-content')
<h1>Editar Inmobiliaria</h1>

<div class="container form-container">
    <form action="{{route('Inmobiliarias.update',['inmo'=>$inmo])}}" method="post" enctype="multipart/form-data" class="w-50" >
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <label for="Id" class="form-label">Id</label>
                <input type="number" name="inmoId" class="form-control" disabled value="{{$inmo->inmoId}}">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="inmoName" class="form-label">Nombre</label>
                <input type="text" name="inmoName" class="form-control"  value="{{$inmo->inmoName}}">
                @error('inmoName')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="inmoLogo" class="form-label">Logo</label>
                <img src="{{asset('storage/'.$inmo->inmoLogo)}}" alt="{{$inmo->inmoLogo}}" style="width:120px; height:60px">
                <input type="file" name="inmoLogo" class="form-control" >
                @error('inmoLogo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="inmoWeb" class="form-label">Website</label>
                <input type="url" name="inmoWeb" class="form-control" value="{{$inmo->inmoWeb}}">
                @error('inmoWeb')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="inmoAddress" class="form-label">Dirección</label>
                <input type="text" name="inmoAddress" class="form-control" value="{{$inmo->inmoAddress}}">
            </div>
            @error('inmoAddress')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
