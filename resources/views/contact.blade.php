@extends('layout')
@section('main-content')

<h1><center>Contacto</center></h1>

<div class="container flex align-items-center justify-content-center w-50 mb-4 pb-5">
    <form name="mailto" action="mailto:emarketing.contacto@gmail.com" method="post" enctype="text/plain" onsubmit="return validationForm()">
        <div class="row">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control">
            <p id="validationNombre" class="alert alert-danger" style="font-size:.7rem; visibility:hidden">*Campo Requerido</p>
        </div>
        <div class="row">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control">
            <p id="validationTelefono" class="alert alert-danger" style="font-size:.7rem; visibility:hidden">*Campo Requerido</p>
        </div>
        <div class="row">
            <label for="busqueda" class="form-label">Busco</label>
            <select name="busqueda" class="form-control dropdown text-center">
                <option>>-- Elegir Una Opción --<</option>
                <option value="casa">Casa</option>
                <option value="casa">Departamento</option>
                <option value="casa">Terreno</option>
                <option value="casa">Comercio</option>
            </select>
        </div>

        <div class="row">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea name="mensaje" cols="30" rows="10" style="resize: none" class="form-control"></textarea>
        </div>

        <div class="row flex w-100 gap-2 align-items-center justify-content-center mb-3">
            <input type="submit" value="Enviar" class="btn btn-sm button">
            <a href="/" class="btn btn-sm btn-danger">Cancelar</a>
        </div>
    </form>
</div>
<script>

function validationForm(){
    let nombre= document.forms["mailto"]["nombre"].value;
    let telefono= document.forms["mailto"]["telefono"].value;

    if(nombre == "" ){
        document.getElementById('validationNombre').style.visibility="visible";
        return false;
    }else{
        document.getElementById('validationNombre').style.visibility="hidden";
    }

    if(telefono == ""){
        document.getElementById('validationTelefono').style.visibility="visible";
        return false;
    }else{
        document.getElementById('validationTelefono').style.visibility="hidden";
    }

}

</script>
@endsection
