@extends('layout')

@section('main-content')
<div style="margin-top: -6vh">
    {{-- ATTENTION --}}
    @include('Partials/_heroIndex')
</div>

<div class="main-home">

    {{--home section Houses --}}
    <div class="home-section">
        <div class="home-subtitle">
            <h2>Últimas Casas</h2>
        </div>

        {{-- Last Houses --}}
        <div class="lastDivs">
            @php
                $houseId = 0;
                $houseCounter = 0;
            @endphp

            @foreach ($LastHouses as $lasthouse)
                {{-- Remove duplicate houses w/id --}}
                @if ($houseId !== $lasthouse->propId)
                    {{-- show only 4 houses--}}
                    @php $houseCounter +=1; @endphp
                    @if ($houseCounter < 5)
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('storage/'.$lasthouse->imageName)}}" class="card-img-top" alt="..." width="290px" height="160px">
                            <div class="card-body">
                            <h5 class="card-title text-center">{{$lasthouse->propName}}</h5>
                            <p class="card-text bizType">{{$lasthouse->biztypeName}}</p>
                            <div class="card-button">
                                <a href="{{route('Properties.show', ['property'=>$lasthouse->propId])}}" class="btn btn-sm button" style="font-size: .8rem">Más información...</a>
                            </div>
                            </div>
                        </div>
                    @endif
                @endif

                @php
                    $houseId = $lasthouse->propId;

                @endphp

            @endforeach
        </div>
        {{-- End last Houses --}}
    </div>
    {{--end home section Houses --}}

    {{--home section Appartments --}}
    <div class="home-section">
        <div class="home-subtitle">
            <h2>Últimos Departamentos</h2>
        </div>
        <div class="lastDivs">
            @php
                $appartmentId = 0;
                $appartmentCounter = 0;
            @endphp

            @foreach ($LastAppartments as $lastappartment)
                {{-- Remove duplicate houses w/id --}}
                @if ($appartmentId !== $lastappartment->propId)
                    {{-- show only 4 houses--}}
                    @php $appartmentCounter +=1; @endphp
                    @if ($appartmentCounter < 5)
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('storage/'.$lastappartment->imageName)}}" class="card-img-top" alt="..." width="290px" height="160px">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$lastappartment->propName}}</h5>
                                <p class="card-text bizType">{{$lastappartment->biztypeName}}</p>
                                <div class="card-button">
                                    <a href="{{route('Properties.show', ['property'=>$lastappartment->propId])}}" class="btn btn-sm button" style="font-size: .8rem">Más información...</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                @php
                    $appartmentId = $lastappartment->propId;

                @endphp

            @endforeach
        </div>
    </div>
    {{--end section Appartments --}}

    {{--home section Terrenos --}}
    <div class="home-section">
        <div class="home-subtitle">
            <h2>Últimos Terrenos</h2>
        </div>
        <div class="lastDivs">
            @php
                $terrenoId = 0;
                $terrenoCounter = 0;
            @endphp

            @foreach ($LastTerrenos as $lastterreno)
                {{-- Remove duplicate houses w/id --}}
                @if ($terrenoId !== $lastterreno->propId)
                    {{-- show only 4 houses--}}
                    @php $terrenoCounter +=1; @endphp
                    @if ($terrenoCounter < 5)
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('storage/'.$lastterreno->imageName)}}" class="card-img-top" alt="..." width="290px" height="160px">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$lastterreno->propName}}</h5>
                                <p class="card-text bizType">{{$lastterreno->biztypeName}}</p>
                                <div class="card-button">
                                    <a href="{{route('Properties.show', ['property'=>$lastterreno->propId])}}" class="btn btn-sm button" style="font-size: .8rem">Más información...</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                @php
                    $terrenoId = $lastterreno->propId;

                @endphp

            @endforeach
        </div>
    </div>
    {{--end section Terrenos --}}

    {{--home section Comercios --}}
    <div class="home-section">
        <div class="home-subtitle">
            <h2>Últimos Comercios</h2>
        </div>
        <div class="lastDivs">
            @php
                $comercioId = 0;
                $comercioCounter = 0;
            @endphp

            @foreach ($LastComercios as $lastcomercio)
                {{-- Remove duplicate houses w/id --}}
                @if ($comercioId !== $lastcomercio->propId)
                    {{-- show only 4 houses--}}
                    @php $comercioCounter +=1; @endphp
                    @if ($comercioCounter < 5)
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('storage/'.$lastcomercio->imageName)}}" class="card-img-top" alt="..." width="290px" height="160px">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$lastcomercio->propName}}</h5>
                                <p class="card-text bizType">{{$lastcomercio->biztypeName}}</p>
                                <div class="card-button">
                                    <a href="{{route('Properties.show', ['property'=>$lastcomercio->propId])}}" class="btn btn-sm button" style="font-size: .8rem">Más información...</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                @php
                    $comercioId = $lastcomercio->propId;

                @endphp

            @endforeach
        </div>
    </div>
    {{--end section Comercios --}}

    {{-- Inmobiliarias --}}
    <div class="home-section">
        <div class="home-subtitle">
            <h2>Ultimas Inmobiliarias</h2>
        </div>
        <div class="lastDivs">
            @foreach ($inmobiliarias as $inmo)
                <div class="card" style="width:18rem">
                    <img src="{{asset('storage/'.$inmo->inmoLogo)}}" class="card-img-top" alt="{{$inmo->inmoName}}" width="290px" height="160px">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$inmo->inmoName}}</h5>
                        <p class="card-button">
                            <a href="{{route('Inmobiliarias.show', ['inmo'=>$inmo->inmoId])}}" class="btn btn-sm button" style="font-size: .8rem">Más información...</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- End Inmobiliarias --}}




</div> <!-- end main-home -->

@endsection <!-- end main content -->


