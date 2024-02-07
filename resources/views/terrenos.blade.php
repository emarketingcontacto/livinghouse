@extends('layout');

@section('main-content')

    <div class="d-flex w-100 bg-dark align-items-center" style="margin-top: -5vh; height:10vh" >
        <label style="color:#e1e1e1; margin-right:1vw; margin-left:3vw;">Tipo de Operación:</label>
        <form action="{{route('Terrenos')}}" method="post">
            @csrf
            @method('GET')
            <select name="bizmode" class="dropdown text-center form-control bg-dark" style="width: auto; color:#E8BC15;  border:#E8BC15 solid 1px" onchange="this.form.submit()">
                <option value="all" {{$bizmode === null ? 'selected': ''}}>--Seleccionar Tipo de Operación--</option>
                <option value="renta" {{$bizmode==='renta' ? 'selected': ''}}>Renta</option>
                <option value="venta" {{$bizmode==='venta' ? 'selected': ''}}>Venta</option>
                <option value="all"   {{$bizmode === 'all' ? 'selected': ''}}>Todos</option>
            </select>
        </form>
    </div>

    <div class="container-fluid d-flex flex-wrap gap-2 justify-content-center">
    @php
        $actualProp = 0;
    @endphp
        @foreach ($propiedades as $propiedad)

        @if ($actualProp != $propiedad->propId)

                {{-- container --}}
                <div class="card mt-3" style="width: 18rem;">
                    <img src="{{asset('storage/'.$propiedad->imageName)}}" class="card-img-top" alt="{{$propiedad->imageName}}">
                    <div class="card-bodys">
                    <h5 class="card-title text-center">{{$propiedad->propName}}</h5>
                    <p class="text-center bg-dark" style="color:#E8BC15; border-radius:3rem 5%; font-size:.7rem">{{$propiedad->biztypeName}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            <h3 class="text-center"><span class="material-symbols-outlined fs-2">home_pin</span></h3>
                            <p class="card-text w-100 text-center" style="font-size: .8rem"> {{$propiedad->propLocation}} </p>
                        </li>

                        <li class="list-group-item d-flex">
                            <h3 class="text-center"><span class="material-symbols-outlined">help_clinic</span></h3>
                            <p class="card-text w-100 text-center" style="font-size: .8rem"> {{$propiedad->propDetails}} </p>
                        </li>

                        <li class="list-group-item d-flex flex-wrap">
                            <h3 class="text-center"><span class="material-symbols-outlined fs-2">square_foot</span></h3>
                            <p class="text-center p-1" style="font-size:.8rem">Ft: {{$propiedad->propFront}}</p>
                            <p class="text-center p-1" style="font-size:.8rem">Fd: {{$propiedad->propDepth}}</p>
                            <p class="text-center p-1" style="font-size:.8rem">Total: {{$propiedad->propTotal}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-around">
                                <h3 class="text-center"><span class="material-symbols-outlined fs-2">shower</span></h3>
                                <p class="text-center" style="font-size: .8rem">{{$propiedad->propBaths}}</p>
                                <h3 class="text-center"><span class="material-symbols-outlined">bed</span></h3>
                                <p class="text-center" style="font-size: .8rem">{{$propiedad->propBedroom}}</p>
                                <h3><span class="material-symbols-outlined">nature</span></h3>
                                <p class="text-center" style="font-size: .8rem">{{$propiedad->propGarden}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-around">
                            <h3><span class="material-symbols-outlined">directions_car</span></h3>
                            <p style="font-size: .8rem">{{$propiedad->propParking}}</p>
                            <h3><span class="material-symbols-outlined">local_police</span></h3>
                            <p style="font-size: .8rem">{{$propiedad->propSurveillance}}</p>
                        </li>
                    </ul>
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
