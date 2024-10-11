@extends('layout')

@section('main-content')

<h1>Editar Propiedad</h1>

<div class="container d-flex mb-5 p-3 bg-light" style="justify-content:center" >


{{-- form --}}
    <form action="{{route('Properties.update', ['property'=>$property])}}" method="POST" class="w-50">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <label for="ID" class="form-label">ID</label>
                <input type="number" name="propId" class="form-control text-center" disabled value="{{$property->propId}}">
            </div>

            {{-- categoria --}}
            <div class="col">
                <label for="Categoria" class="form-label">Categoria</label>
                <select name="categoryId" id="" class="form-control dropdown w-100 text-center">
                    <option value=""> Elegir una opción </option>
                    @foreach ($categories as $category)
                        @if ($category->categoryId === $property->categoryId)
                            <option value="{{$category->categoryId}}" selected> {{$category->categoryName}}</option>
                        @endif
                        <option value="{{$category->categoryId}}">{{$category->categoryName}}</option>
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
                    @foreach ($biztypes as $biztype)
                        <option value="{{$biztype->biztypeId}}" {{$biztype->biztypeId === $property->biztypeId ? 'selected' :'' }}>{{$biztype->biztypeName}}</option>
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
                <input type="text" name="propName" class="form-control" value="{{$property->propName}}">
            </div>
        </div>

           {{-- Inmobiliarias --}}
           <div class="row">
            <div class="col">
                <label for="InmoId">Inmobiliaria</label>
                <select name="inmoId" class="form-control dropdown w-100 text-center">
                    @foreach ($inmobiliarias as $inmo)
                        @if ($inmo->inmoId === $property->inmoId)
                            <option value="{{$inmo->inmoId}}" selected>{{$inmo->inmoName}} </option>
                        @endif
                        <option value="{{$inmo->inmoId}}">{{$inmo->inmoName}}</option>
                    @endforeach
                </select>
                {{-- Error --}}
                @error('InmoId')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>


         {{-- Details --}}
         <div class="row mt-3">
            <label for="propDetails" class="form-label">Detalles</label>
            <textarea name="propDetails" cols="30" rows="10" style="resize: none">
                {{$property->propDetails}}
            </textarea>
            {{-- Error --}}
            @error('propDetails')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- Street Num --}}
        <div class="row mt-3">
            <label for="propStreetNum" class="form-label">Calle #</label>
            <input type="text" name="propStreetNum" class="form-control" value="{{$property->propStreetNum}}">
            {{-- Error --}}
            @error('propStreetNum')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

         {{-- Neighborhood --}}
         <div class="row mt-3">
            <label for="propNeighborhood" class="form-label">Colonia</label>
            <input type="text" name="propNeighborhood" class="form-control" value="{{$property->propNeighborhood}}" placeholder="Colonia">
            {{-- Error --}}
            @error('propNeighborhood')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mt-3">
            {{-- City --}}
            <div class="col">
              <label for="propCity" class="form-label">Ciudad</label>
              <input type="text" name="propCity" class="form-control" value="{{$property->propCity}}" placeholder="Ciudad">
              {{-- Error --}}
              @error('propCity')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

           {{-- State --}}
           <div class="col">
              <label for="propState" class="form-label">Estado</label>
              <input type="text" name="propState" class="form-control" value="{{$property->propState}}" placeholder="Estado">
              {{-- Error --}}
              @error('propState')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

      </div>



        <div class="row mt-3">
            {{-- Frente --}}
            <div class="col">
                <label for="propFront" class="form-label">Frente (mts2)</label>
                <input type="text" name="propFront" class="form-control" style="text-align: end" value="{{$property->propFront}}">
                {{-- Error --}}
                @error('propFront')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Profundidad --}}
            <div class="col">
                <label for="propDepth" class="form-label">Profundidad (mts2)</label>
                <input type="text" name="propDepth" class="form-control" style="text-align: end" value="{{$property->propDepth}}">
                 {{-- Error --}}
                 @error('propDepth')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Total --}}
            <div class="col">
                <label for="propTotal" class="form-label">Total (mts2)</label>
                <input type="text" name="propTotal" class="form-control" style="text-align: end" value="{{$property->propTotal}}">
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
                <input type="number" name="propBaths" class="form-control" style="text-align: center" value="{{$property->propBaths}}">
                {{-- Error --}}
                @error('propBaths')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Recamaras --}}
            <div class="col">
                <label for="propBedroom" class="form-label">Recamaras</label>
                <input type="number" name="propBedroom" class="form-control" style="text-align: center" value="{{$property->propBedroom}}">

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
                <input type="checkbox" name="propSurveillance" style="height:25px" @if ($property->propSurveillance === 1) checked @endif>
            </div>
            {{-- Jardín --}}
            <div class="col d-flex flex-column" style="justify-content: center; align-items:center" >
                <label for="propGarden" class="form-label">Jardín</label>
                <input type="checkbox" name="propGarden" style="height:25px" @if ($property->propGarden === 1) checked @endif >
            </div>
        </div>

        <div class="row mt-3">
            {{-- Estacionamiento --}}
            <div class="col">
                <label for="propParking" class="form-label">Espacios de Estacionamiento</label>
                <input type="number" name="propParking" class="form-control" style="text-align: center" value="{{$property->propParking}}">
                {{-- Error --}}
                @error('propParking')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            {{-- Status --}}
            <div class="col">
                <label for="propStatus" class="form-label">Estatus</label>
                <select name="propStatus"  class="form-control dropdown w-100 text-center">
                    <option value="">Elegir una opción</option>
                    @if ($property->propStatus == 'Construccion')
                         <option value="Construccion" selected>En Construcción</option>
                    @endif
                    @if ($property->propStatus === 'Terminada')
                        <option value="Terminada" selected>Terminada</option>
                    @endif
                </select>
                {{-- Error --}}
                @error('propStatus')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Precio --}}
        <div class="row d-flex mt-3" style="align-items: center; justify-content:center">
            <label for="propPrice" class="form-label text-center" >Precio</label>
            <input type="text" name="propPrice" class="form-control w-50" style="text-align: end" value="{{$property->propPrice}}">
            {{-- Error --}}
            @error('propPrice')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- controls --}}

        {{-- imagenes --}}
        <div class="row mt-3 d-flex flex-wrap align-items-center justify-content-center">
            @if ($imagesCount === 0)
                <a href="{{route('Imagenes.create',['property'=>$property->propId])}}" class="btn btn-sm button w-75">Crear Imagenes</a>
            @else
                <a href="{{route('Imagenes.edit', ['property'=>$property->propId])}}" class="btn btn-sm button w-75">Editar Imagenes</a>
            @endif
        </div>

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

