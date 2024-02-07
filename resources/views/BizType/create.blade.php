@extends('layout')

@section('main-content')

<h1>Nuevo Tipo de Negocio</h1>

<div class="container">
    <form method="POST" action="{{route('Biztype.store')}}">
        @csrf
        @method('POST')

        <div class="row">
            <label for="biztypeId" class="form-label">ID</label>
            <input type="number" name="biztypeId" class="form-control" disabled>
        </div>
        <div class="row">
            <label for="biztypeName" class="form-label">Nombre</label>
            <input type="text" name="biztypeName" class="form-control"  value="{{old('biztypeName')}}">
            {{-- Error --}}
            @error('biztypeName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row d-flex gap-2 flex-column w-100" style="align-items: center; justify-content:center" >
                <input type="submit" value="Guardar" class="btn btn-sm button mt-5 w-25">
                <a href="{{route('Biztype.index')}}" class="btn btn-sm button w-25">Cacelar</a>
        </div>
    </form>
</div>

@endsection
