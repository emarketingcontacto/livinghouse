@extends('layout')

@section('main-content')

<h1>Editar Tipo de Negocio</h1>

<div class="container">
    <form method="POST" action="{{route('Biztype.update', ['biztype'=>$biztype])}}">
        @csrf
        @method('PUT')

        <div class="row">
            <label for="biztypeId" class="form-label">ID</label>
            <input type="number" name="biztypeId" class="form-control" disabled value="{{$biztype->biztypeId}}">
        </div>
        <div class="row">
            <label for="biztypeName" class="form-label">Nombre</label>
            <input type="text" name="biztypeName" class="form-control" value="{{$biztype->biztypeName}}">
            {{-- Error --}}
            @error('biztypeName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- controls --}}

        <div class="row d-flex gap-2 flex-column w-100" style="align-items: center; justify-content:center" >
            {{-- save --}}
            <input type="submit" value="Guardar" class="btn btn-sm button mt-5 w-25">
            {{-- cancel --}}
            <a href="{{route('Biztype.index')}}" class="btn btn-sm button-cancel w-25">Cacelar</a>
        </div>
    </form>
</div>

@endsection
