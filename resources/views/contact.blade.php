@extends('layout')
@section('main-content')

<h1>Contacto</h1>

<div class="container flex align-items-center justify-content-center w-50 mb-4 pb-5">
    <form action="mailto:emarketing.contacto@gmail.com" method="post" enctype="text/plain">
        <div class="row mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="row mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control">
        </div>
        <div class="row mb-3">
            <label for="busqueda" class="form-label">Busco</label>
            <select name="busqueda" class="form-control dropdown text-center">
                <option>>-- Elegir Una Opción --<</option>
                <option value="casa">Casa</option>
                <option value="casa">Departamento</option>
                <option value="casa">Terreno</option>
                <option value="casa">Comercio</option>
            </select>
        </div>

        <div class="row mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea name="mensaje" cols="30" rows="10" style="resize: none" class="form-control"></textarea>
        </div>

        <div class="row flex w-100 gap-2 align-items-center justify-content-center mb-3">
            <input type="submit" value="Enviar" class="btn btn-sm button w-25">
            <a href="/" class="btn btn-sm btn-danger w-25">Cancelar</a>
        </div>
    </form>
</div>

@endsection
