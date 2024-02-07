@extends('layout')
@section('main-content')

<h1>Edit Usuario</h1>

<div class="container d-flex align-items-center justify-content-center">

    {{-- form --}}

    <form action="{{route('User.update', ['user'=>$user])}}" method="post" class="m-4 p-5 w-50">
    @csrf
    @method('PUT')

        <div class="row mb-4">
                <label for="Id" class="form-label">ID</label>
                <input type="number" name="id" class="form-control" value="{{$user->id}}" disabled>
        </div>

        <div class="row mb-4">
            <label for="" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre Paterno Materno" value="{{$user->name}}">
            {{-- error --}}
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="row mb-4">
            <label for="username" class="form-label">Alias</label>
            <input type="text" name="username" class="form-control" placeholder="Alias" value="{{$user->username}}">
            {{-- error --}}
            @error('username')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="row mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="" class="form-control" placeholder="nombre@compañia.com" value="{{$user->email}}">
            {{-- error --}}
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        {{-- password --}}
        <div class="row mb-4">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Mínimo 6 carácteres" value="{{$user->password}}">
            {{-- error --}}
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        {{-- confirm password --}}
        <div class="row mb-4">
            <label for="password_confirmation" class="form-label">Confirmación Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Mínimo 6 carácteres" value="{{$user->password}}">
            {{-- error --}}
            @error('password_confirmation')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="row mb-4">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="phone" name="phone" class="form-control" placeholder="(477)000-00-00" value="{{$user->phone}}">
            {{-- error --}}
            @error('phone')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="row mb-4">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" name="address" class="form-control" placeholder="Calle #, Colonia, Estado" value="{{$user->address}}">
            {{-- error --}}
            @error('address')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="row mb-4">
            <div class="col">
                <label for="role" class="form-label">Rol</label>
                <select name="role" class="form-control dropdown text-center" style="width: 25vw">
                    <option> -- Seleccionar --</option>
                    <option value="admin" @php echo ($user->role =='admin') ? 'selected' :''; @endphp>Administador</option>
                    <option value="agent" @php echo ($user->role =='agent') ? 'selected' :''; @endphp>Agente</option>
                    <option value="user" @php echo ($user->role =='user') ? 'selected' :''; @endphp>Usuario</option>

                </select>
                {{-- error --}}
                @error('rol')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control dropdown text-center" style="width: 25vw">
                    <option> -- Seleccionar --</option>
                    <option value="active" @php echo ($user->status =='active') ? 'selected' : ''; @endphp>Activo</option>
                    <option value="inactive" @php echo ($user->status =='inactive') ? 'selected' :''; @endphp>Inactivo</option>
                </select>
                {{-- error --}}
                @error('status')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="row d-flex gap-3 align-items-center justify-content-end mt-3 pt-4">
            {{-- Save --}}
            <input type="submit" value="Guardar" class="btn btn-sm button w-25">
            {{-- Cancel --}}
            <a href="{{route('User.index')}}" class="btn btn-sm w-25 btn-danger">Cancelar</a>
        </div>

    </form>
    {{-- end form --}}
</div>

@endsection
