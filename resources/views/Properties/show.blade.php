@extends('layout');

@section('main-content')
<div class="d-flex align-items-center justify-content-center w-100 bg-dark p-2" style="margin-top:-5vh; color:#E8BC15">
    <h3>{{$property->propName}}</h3>
</div>
{{-- Corrouse --}}
<div id="carouselProperties" class="carousel slide">
    <div class="carousel-inner">
        @foreach ($images as $image)
        <div class="carousel-item active">
            <img src="{{asset('storage/'.$image->imageName)}}" class="d-block w-100" alt="{{$image->imageName}}" style="height:50vh">
          </div>
          @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProperties" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselProperties" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
{{-- End Corrouse --}}

{{-- Container --}}
<div class="container d-flex w-100 align-items-center justify-content-around" style="padding-top: 5vh; padding-bottom:5vh">
    <div class="d-grid w-50">
        <div class="row row-fields" style="background-color: #000; border-radius: 5px;">
            <div class="col col-fields col-3">
                <span class="material-symbols-outlined fs-2" >paid</span>
                <span class="sm-span">Precio</span>
            </div>
            <div class="col col-values mt-3" style="color:#E8BC15">
                <p class="fs-4" style="currency, currency:'MXN'">${{$property->propPrice}}</p>
            </div>
        </div>

        {{-- Details --}}
        <div class="row row-fields">
            <div class="col col-fields col-3">
                <span class="material-symbols-outlined">help_clinic</span>
                <span class="sm-span">Detalles</span>
            </div>
            <div class="col col-values mt-2">
                {{$property->propDetails}}
            </div>
        </div>
        {{-- End Details --}}

        {{-- Location  --}}
        <div class="row row-fields">
            <div class="col col-fields col-3">
                <span class="material-symbols-outlined fs-2">home_pin</span>
                <span class="sm-span">Ubicación</span>
            </div>
            <div class="col col-values">
                <p>{{$property->propStreetNum}}</p>
                <p>- {{$property->propNeighborhood}}</p>
                <p>- {{$property->propCity}}</p>
                <p>- {{$property->propState}}</p>
            </div>
        </div>
        {{-- end Location  --}}

        {{-- Category BizType --}}
        <div class="row row-fields">
            <div class="col col-fields">
                <span class="material-symbols-outlined fs-2">key_vertical</span>
                <span class="sm-span">Categoria</span>
            </div>
            <div class="col col-values mt-2">
                {{$category->categoryName}}
            </div>
            <div class="col col-fields">
                <span class="material-symbols-outlined fs-2">payments</span>
                <span class="sm-span">Tipo de Negocio</span>
            </div>
            <div class="col col-values">
                {{$biztype->biztypeName}}
            </div>
        </div>
        {{-- Category BizType --}}

        {{-- Baths & Beds --}}
        <div class="row row-fields">
            <div class="col col-fields">
                <span class="material-symbols-outlined fs-2">shower</span>
                <span class="sm-span">Baños</span>
            </div>
            <div class="col col-values">
                {{$property->propBaths}}
            </div>
            <div class="col col-fields">
                <span class="material-symbols-outlined fs-2">bed</span>
                <span class="sm-span">Recamaras</span>
            </div>
            <div class="col col-values">
                {{$property->propBedroom}}
            </div>
        </div>
        {{-- End Baths & Beds --}}



        {{-- Seizes --}}
        <div class="row row-fields">
            <div class="col col-fields">
                <span class="material-symbols-outlined fs-2">square_foot</span>
                <span class="sm-span">Medidas</span>
            </div>
            <div class="col col-values">Frente -  {{$property->propFront}}</div>
            <div class="col col-values">Fondo -   {{$property->propDepth}} </div>
            <div class="col col-values" >Total -   {{$property->propTotal}}</div>
        </div>
        {{-- End Sizes --}}

        {{-- Garden & Parking --}}
        <div class="row row-fields">
            <div class="col col-fields">
                <span class="material-symbols-outlined fs-2">nature</span>
                <span class="sm-span">Jardín</span>
            </div>
            <div class="col col-values">
                {{$property->propGarden}}
            </div>
            <div class="col col-fields">
                <span class="material-symbols-outlined fs-2">directions_car</span>
                <span class="sm-span">Estacionamiento</span>
            </div>
            <div class="col col-values">
                {{$property->propParking}}
            </div>
        </div>
        {{-- end Garden & Parking --}}

        {{-- Status & Surveillance  --}}

        <div class="row row-fields">
            <div class="col col-fields">
                <span class="material-symbols-outlined fs-2">home_app_logo</span>
                <span class="sm-span">Status</span>
            </div>
            <div class="col col-values">
                    {{$property->propStatus}}
            </div>
            <div class="col col-fields">
                <span class="material-symbols-outlined fs-2">local_police</span>
                <span class="sm-span">Vigilancia</span>
            </div>
            <div class="col col-values">
                {{$property->propSurveillance}}
            </div>
        </div>
        {{-- End Status & Surveillance  --}}


    </div>
</div>
{{-- End Container --}}


@endsection
