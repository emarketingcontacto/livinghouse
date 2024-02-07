@extends('layout');

@section('main-content')
    <div class="container">
        <h1>Login</h1>
    <div class="container d-flex w-50 align-items-center justify-content-center">
        <form action="{{route('User.authenticate')}}" method="post">
        @csrf
        @method('POST')
            <div class="row mb-t pb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
                {{-- Error --}}
                @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="row mb-t pb-2">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control">
                {{-- Error --}}
                @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="row d-flex gap-2">
                <div class="col">
                    <input type="submit" value="Login" class="btn btn-sm button w-100">
                </div>
                <div class="col">
                    <a href="{{route('User.create')}}" class="btn btn-sm button w-100">Registro</a>
                </div>
                <a href="{{route('User.index')}}" class="btn btn-sm btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
