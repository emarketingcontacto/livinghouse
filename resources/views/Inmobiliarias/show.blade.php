@extends('layout')
@section('main-content')
<div class="show-title">
    <h1>{{$inmo->inmoName}}</h1>
</div>
<div class="show-body">
    <div class="show-image">
        <img src="{{asset('storage/'.$inmo->inmoLogo)}}" alt="{{$inmo->inmoName}}" width="350px" height="350px">
    </div>
    <div class="show-data">
            <div class="col data-title">Ubicación:</div>
            <div class="col data-item">{{$inmo->inmoAddress}}</div>
            <div class="col data-title">Website:</div>
            <div class="col data-item">{{$inmo->inmoWeb}}</div>

    </div>
    <div class="show-contactos">
        <h3>Contactos</h3>
        @foreach ($contactos as $contacto)
        <div class="row">
            <div class="col contacto-title">Nombre:</div>
            <div class="col contacto-data">{{$contacto->contactoName}}</div>
        </div>


        <div class="row">
            <div class="col contacto-title">Teléfono:</div>
            <div class="col contacto-data">{{$contacto->contactoPhone}}</div>
        </div>

        <div class="row">
            <div class="col contacto-title">Email:</div>
            <div class="col contacto-data">{{$contacto->contactoEmail}}</div>
        </div>

        @endforeach
    </div>

</div>

<div class="properties">
    {{-- proiedades --}}
    @php
        $appartmentId = 0;
        $appartmentCounter = 0;
    @endphp


    @foreach ($propiedades as $prop)

        {{-- Remove duplicate houses w/id --}}
        @if ($appartmentId !== $prop->propId)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('storage/'.$prop->imageName)}}" class="card-img-top" alt="..." width="290px" height="160px">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$prop->propName}}</h5>
                    <p class="card-text bizType">{{$prop->biztypeName}}</p>
                    <div class="card-button">
                        <a href="{{route('Properties.show', ['property'=>$prop->propId])}}" class="btn btn-sm button" style="font-size: .8rem">Más información...</a>
                    </div>
                </div>
            </div>
        @endif
        @php
        $appartmentId = $prop->propId;
        @endphp
    @endforeach
{{-- End proiedades --}}
</div>




@endsection
