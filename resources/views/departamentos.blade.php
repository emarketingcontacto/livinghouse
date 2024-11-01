@extends('layout')

@section('main-content')

    <div class="d-flex w-100 align-items-center" style="margin-top: -5vh; height:10vh; background-color:rgba(0,0,0,0.50);" >
        {{-- Tipo de operacion  --}}
        <label style="color:#e1e1e1; margin-right:1vw; margin-left:3vw; font-size:.7rem">Tipo de Operación:</label>
        <form action="{{route('Departamentos.index')}}" method="post" class="mt-2">
            @csrf
            @method('GET')
            <select name="bizmode" class="dropdown text-center form-control bg-dark" style="width: auto; color:#E8BC15;  border:#E8BC15 solid 1px;  font-size:.7rem" onchange="this.form.submit()">
                <option value="all" {{$bizmode === null ? 'selected': ''}}>--Seleccionar Tipo de Operación--</option>
                <option value="renta" {{$bizmode==='renta' ? 'selected': ''}}>Renta</option>
                <option value="venta" {{$bizmode==='venta' ? 'selected': ''}}>Venta</option>
                <option value="all"   {{$bizmode === 'all' ? 'selected': ''}}>Todos</option>
            </select>
        </form>
        {{-- End Tipo de operacion  --}}

        {{-- Neighborhood --}}
        <x-neighborhood routeName="Departamentos.index"></x-neighborhood>
        {{-- End Neighborhood --}}

    </div>

    <div class="container-fluid d-flex flex-wrap gap-2 justify-content-center" style="margin-bottom: 3vh; padding-bottom:3vh">
    @php
        $actualProp = 0;
    @endphp
        @foreach ($propiedades as $propiedad)

            @if ($actualProp != $propiedad->propId)
                {{-- container --}}
                <div class="card mt-3" style="width: 18rem;">
                    <img src="{{asset('storage/'.$propiedad->imageName)}}" class="card-img-top" width="285px" height="160px">

                    <div class="card-body">
                        {{-- Nombre --}}
                        <h5 class="card-title text-center">{{$propiedad->propName}}</h5>
                        {{-- Description --}}
                        <p class="card-text w-100 text-center" style="font-size: .8rem"> {{$propiedad->propDescription}} </p>
                        {{-- Tipo --}}
                        <p class="text-center bg-dark" style="color:#E8BC15; border-radius:10px; font-size:.7rem">{{$propiedad->biztypeName}}</p>
                    </div>
                    <ul class="list-group list-group-flush">

                        {{-- Detalles --}}
                        <li class="list-group-item d-flex flex-column">
                            <h3 class="text-center"><span class="material-symbols-outlined">help_clinic</span></h3>
                            <p class="card-text w-100 text-center" style="font-size: .8rem"> {{$propiedad->propDetails}} </p>
                        </li>
                        {{-- end Detalles --}}

                        {{-- Address --}}
                        <li class="list-group-item d-flex flex-column justify-content-between align-items-center">
                            <h3 class="text-center"><span class="material-symbols-outlined fs-2">home_pin</span></h3>
                            <div class="flex flex-column">
                                <p class="card-text w-100 text-center" style="font-size: .8rem"> {{$propiedad->propStreetNum}} , {{$propiedad->propNeighborhood}},  </p>
                                <p class="card-text w-100 text-center" style="font-size: .8rem"> {{$propiedad->propCity}} -  {{$propiedad->propState}}  </p>
                            </div>
                        </li>
                        {{-- end Address --}}

                        {{-- Seize --}}
                        <li class="list-group-item d-flex flex-column flex-wrap justify-content-between align-items-center">
                            <div class="flex">
                                <h3 class="text-center"><span class="material-symbols-outlined fs-2">square_foot</span></h3>
                            </div>
                            <div class="flex">
                                <p class="text-center p-1" style="font-size:.8rem">Construcción(m2): {{$propiedad->propBuilt}}</p>
                                <p class="text-center p-1" style="font-size:.8rem">Terreno(m2): {{$propiedad->propTerrain}}</p>
                            </div>
                        </li>
                        {{-- end Seize --}}

                        {{-- insides --}}
                        <li class="list-group-item d-flex justify-content-around">
                            <div class="d-grid">
                                <div class="row">
                                    <span class="material-symbols-outlined fs-2 yellow-font">shower</span>
                                </div>
                                <div class="row">
                                    <h3 class="text-center" style="font-size: .75rem">Baños</h3>
                                </div>
                                <div class="row">
                                    <p class="text-center" style="font-size: .8rem">{{$propiedad->propBaths}}</p>
                                </div>
                            </div>
                            <div class="d-grid"  style="text-align: center">
                                <div class="row">
                                    <span class="material-symbols-outlined yellow-font">bed</span>
                                </div>
                                <div class="row">
                                    <h3 class="text-center yellow-font"  style="font-size: .75rem">Recamaras</h3>
                                </div>
                                <div class="row">
                                    <p class="text-center" style="font-size: .8rem">{{$propiedad->propBedroom}}</p>
                                </div>
                            </div>
                            <div class="grid" style="text-align: center">
                                <div class="row">
                                    <span class="material-symbols-outlined yellow-font">nature</span>
                                </div>
                                <div class="row">
                                    <h3 class="text-center" style="font-size: .75rem">Jardín</h3>
                                </div>
                                <div class="row">
                                    <p class="text-center" style="font-size: .8rem">{{$propiedad->propGarden}}</p>

                            </div>

                        </li>
                        {{-- end insides --}}

                        {{-- surveillance --}}
                        <li class="list-group-item d-flex justify-content-around">
                            <div class="d-grid" style="text-align: center">
                                <div class="row">
                                    <span class="material-symbols-outlined yellow-font">directions_car</span>
                                </div>
                                <div class="row">
                                    <h3 style="font-size:.75rem">Estacionamiento</h3>
                                </div>
                                <div class="row">
                                    <p style="font-size: .8rem">{{$propiedad->propParking}}</p>
                                </div>
                            </div>
                            <div class="d-grid" style="text-align: center">
                                <div class="row">
                                    <span class="material-symbols-outlined yellow-font">local_police</span>
                                </div>
                                <div class="row">
                                    <h3 style="font-size:.75rem">Vigilancia</h3>
                                </div>
                                <div class="row">
                                    <p style="font-size: .8rem">{{$propiedad->propSurveillance}}</p>
                                </div>
                            </div>
                        </li>
                        {{-- end surveillance --}}
                    </ul>
                    <div class='properties-image'>
                        <img src="{{asset('storage/'.$propiedad->inmoLogo)}}" alt="{{$propiedad->inmoName}}" width="200px" height="100px">
                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('Properties.show', ['property'=>$propiedad->propId])}}" class="btn btn-sm button" style="font-size: .8rem">Más información...</a>
                    </div>
                </div>
                {{-- endcontainer --}}
            @endif
    @php
        $actualProp = $propiedad->propId;
    @endphp

    @endforeach

    </div>



@endsection
