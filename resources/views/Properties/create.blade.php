@extends('layout')

@section('main-content')

<h1>Nueva Propiedad</h1>

<div class="container d-flex mb-5 p-3 bg-light" style="justify-content:center" >


{{-- form --}}
    <form action="{{route('Properties.store')}}" method="POST" class="w-50">
        @csrf
        @method('POST')

        <div class="row">
            <div class="col">
                <label for="ID" class="form-label">ID</label>
                <input type="number" name="propId" class="form-control" disabled>
            </div>

            {{-- categoria --}}
            <div class="col">
                <label for="Categoria" class="form-label">Categoria</label>
                <select name="categoryId" class="form-control dropdown w-100 text-center">
                    <option value=""> Elegir una opción </option>
                    @foreach ($categories as $category)
                        <option value="{{$category->categoryId}}" {{$category->categoryId === old('categoryId'? 'selected': '')}}>{{$category->categoryName}}</option>
                    @endforeach
                </select>
                 {{-- Error --}}
                 @error('categoryId')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- tipo --}}
            <div class="col">
                <label for="biztypeId" class="form-label">Tipo</label>
                <select name="biztypeId" id="" class="form-control dropdown w-100 text-center">
                        <option value="">Elegir una opción</option>
                    @foreach ($biztypes as $biztype)
                        <option value="{{$biztype->biztypeId}}">{{$biztype->biztypeName}}</option>
                    @endforeach
                </select>
                {{-- Error --}}
                @error('biztypeId')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Nombre --}}
            <div class="row mt-3">
                <label for="propName" class="form-label">Nombre</label>
                <input type="text" name="propName" class="form-control" value="{{old('propName')}}" placeholder="Nombre de la Propiedad">
                {{-- Error --}}
                @error('propName')
                    <div class="alert alert-danger">{{$message}}</div>

                @enderror
            </div>
        </div>

        {{-- Details --}}
        <div class="row mt-3">
            <label for="propDetails" class="form-label">Detalles</label>
            <textarea name="propDetails" cols="30" rows="10" style="resize: none">
                {{old('propDetails')}}
            </textarea>
            {{-- Error --}}
            @error('propDetails')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>


        {{-- Ubicación --}}
        <div class="row mt-3">
            <label for="propLocation" class="form-label">Ubicación</label>
            <input type="text" name="propLocation" class="form-control" value="{{old('propLocation')}}" placeholder="Calle # , Colonia/Fraccionamiento, Ciudad, Estado">
            {{-- Error --}}
            @error('propLocation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mt-3">
            {{-- Frente --}}
            <div class="col">
                <label for="propFront" class="form-label">Frente (mts2)</label>
                <input type="text" id="propFront" name="propFront" class="form-control" style="text-align: end" value="{{old('propFront')}}" placeholder="00.00">
                {{-- Error --}}
                @error('propFront')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Profundidad --}}
            <div class="col">
                <label for="propDepth" class="form-label">Profundidad (mts2)</label>
                <input type="text" id="propDepth" name="propDepth" class="form-control" style="text-align: end" value="{{old('propDepth')}}" placeholder="00.00">
                 {{-- Error --}}
                 @error('propDepth')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Total --}}
            <div class="col">
                <label for="propTotal" class="form-label">Total (mts2)</label>
                <input type="text" id="propTotal"
                  name="propTotal"
                  class="form-control"
                  style="text-align: end"
                  value="{{old('propTotal')}}"
                  placeholder="00.00"
                  onfocus="getTotal()">
                {{-- Error --}}
                @error('propTotal')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            {{-- Baños --}}
            <div class="col">
                <label for="propBaths" class="form-label">Baños</label>
                <input type="number" name="propBaths" class="form-control" style="text-align: center" value="{{old('propBaths')}}" placeholder="0">
                {{-- Error --}}
                @error('propBaths')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Recamaras --}}
            <div class="col">
                <label for="propBedroom" class="form-label">Recamaras</label>
                <input type="number" name="propBedroom" class="form-control" style="text-align: center" value="{{old('propBedroom')}}" placeholder="0">

                {{-- Error --}}
                @error('propBedroom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

        </div>
        {{-- Vigilancia --}}
        <div class="row mt-3">
            <div class="col d-flex flex-column" style="justify-content: center; align-items:center" >
                <label for="propSurveillance" class="form-label">Vigilancia</label>
                <input type="checkbox" name="propSurveillance" style="height:25px" value="{{old('propSurveillance')}}">

            </div>
            {{-- Jardín --}}
            <div class="col d-flex flex-column" style="justify-content: center; align-items:center" >
                <label for="propGarden" class="form-label">Jardín</label>
                <input type="checkbox" name="propGarden" style="height:25px" value="{{old('propGarden')}}">
            </div>
        </div>

        <div class="row mt-3">
            {{-- Estacionamiento --}}
            <div class="col">
                <label for="propParking" class="form-label">Espacios de Estacionamiento</label>
                <input type="number" name="propParking" class="form-control" style="text-align: center" value="{{old('propParking')}}" placeholder="0">
                {{-- Error --}}
                @error('propParking')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            {{-- Entrega --}}
            <div class="col">
                <label for="propState" class="form-label">Entrega</label>
                <select name="propState"  class="form-control dropdown w-100 text-center">
                    <option value="">Elegir una opción</option>
                    <option value="Construccion">En Construcción</option>
                    <option value="Terminada">Terminada</option>
                </select>
                {{-- Error --}}
                @error('propState')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Precio --}}
        <div class="row d-flex mt-3" style="align-items: center; justify-content:center">
            <label for="propPrice" class="form-label text-center" >Precio</label>
            <input type="text" name="propPrice" class="form-control w-50" style="text-align: end" value="{{old('propPrice')}}" placeholder="00.00">
            {{-- Error --}}
            @error('propPrice')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- controls --}}

        <div class="row mt-3 d-flex gap-2  w-100" style="align-items: center; justify-content:center">
        {{-- save --}}
            <input type="submit" value="Guardar" class="btn btn-sm button mt-5 w-25">
        {{-- cancel --}}
        <a href="{{route('Properties.index')}}" class="btn btn-sm button mt-5 w-25">Cancelar</a>
        </div>

    </form>
{{-- end form --}}
</div>
@endsection

