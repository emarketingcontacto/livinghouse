@extends('layout')

@section('main-content')

<h1>Nueva Propiedad</h1>

<div class="container form-container" style="justify-content:center" >


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
                        <option value="{{$category->categoryId}}" {{$category->categoryId == old('categoryId') ? 'selected':''}}>{{$category->categoryName}}</option>
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
                        <option value="{{$biztype->biztypeId}}" {{$biztype->biztypeId == old('biztypeId') ? 'selected' : ''}}>{{$biztype->biztypeName}}</option>
                    @endforeach
                </select>
                {{-- Error --}}
                @error('biztypeId')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Inmobiliarias --}}
            <div class="row">
                <div class="col">
                    <label for="InmoId">Inmobiliaria</label>
                    <select name="inmoId" id="inmoId" class="form-control dropdown w-100 text-center bg-light" onchange="getContactos()">
                        <option value="">Elegir una opción</option>
                        @foreach ($inmobiliarias as $inmo)
                            <option value="{{$inmo->inmoId}}" {{old('inmoId') == $inmo->inmoId ? 'selected': ''}}>{{$inmo->inmoName}} </option>
                        @endforeach
                    </select>

                    {{-- Error --}}
                    @error('InmoId')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>

            {{-- contactos --}}
            <x-ContactoInmo></x-ContactoInmo>


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

          {{-- Description --}}
          <div class="row mt-3">
            <label for="propDescription" class="form-label">Descripción</label>
            <textarea name="propDescription" cols="30" rows="10" style="resize: none">
                {{old('propDescription')}}
            </textarea>
            {{-- Error --}}
            @error('propDescription')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
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


        {{-- StreetNum --}}
        <div class="row mt-3">
            <label for="propStreetNum" class="form-label">Calle y Número</label>
            <input type="text" name="propStreetNum" class="form-control" value="{{old('propStreetNum')}}" placeholder="Calle # ">
            {{-- Error --}}
            @error('propStreetNum')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- Neighborhood --}}
        <div class="row mt-3">
            <label for="propNeighborhood" class="form-label">Colonia</label>
            <input type="text" name="propNeighborhood" class="form-control" value="{{old('propNeighborhood')}}" placeholder="Colonia">
            {{-- Error --}}
            @error('propNeighborhood')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mt-3">

          {{-- City --}}
          <div class="col">
            <label for="propCity" class="form-label">Ciudad</label>
            <input type="text" name="propCity" class="form-control" value="{{old('propCity')}}" placeholder="Ciudad">
            {{-- Error --}}
            @error('propCity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

         {{-- State --}}
         <div class="col">
            <label for="propState" class="form-label">Estado</label>
            <input type="text" name="propState" class="form-control" value="{{old('propState')}}" placeholder="Estado">
            {{-- Error --}}
            @error('propState')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>


        <div class="row mt-3">
            {{-- Built --}}
            <div class="col">
                <label for="propBuilt" class="form-label">Construcción (mts2)</label>
                <input type="text" id="propBuilt" name="propBuilt" class="form-control" style="text-align: end" value="{{old('propBuilt')}}" placeholder="00">
                {{-- Error --}}
                @error('propBuilt')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Profundidad --}}
            <div class="col">
                <label for="propTerrain" class="form-label">Terreno (mts2)</label>
                <input type="text" id="propTerrain" name="propTerrain" class="form-control" style="text-align: end" value="{{old('propTerrain')}}" placeholder="00">
                 {{-- Error --}}
                 @error('propTerrain')
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
            {{-- Entrega - Status --}}
            <div class="col">
                <label for="propStatus" class="form-label">Status</label>
                <select name="propStatus"  class="form-control dropdown w-100 text-center">
                    <option value="">Elegir una opción</option>
                    <option value="Construccion" {{old('propStatus')=="Construccion" ? 'selected' : ''}}>En Construcción</option>
                    <option value="Terminada" {{old('propStatus')=="Terminada" ? 'selected' : ''}}>Terminada</option>
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

