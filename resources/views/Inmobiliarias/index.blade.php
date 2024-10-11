@extends('layout')
@section('main-content')
<div class="container">
    <h1>Inmobiliarias</h1>
    @auth
        @if (auth()->user()->role === 'admin')
            <a href="{{route('Inmobiliarias.create')}}" class="btn btn-sm button">Create</a>
                <hr>
            @if (session()->has('success'))
                <div id="success" class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        <table class="table table-stripped w-75">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Web</th>
                    <th>Address</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inmobiliarias as $inmo)
                <tr>
                    <td>{{$inmo->inmoId}}</td>
                    <td>{{$inmo->inmoName}}</td>
                    <td>
                        <img src="{{asset('storage/'.$inmo->inmoLogo )}}" alt="{{$inmo->inmoLogo}}" style="width:120px; height:60px">
                    </td>
                    <td>{{$inmo->inmoWeb}}</td>
                    <td>{{$inmo->inmoAddress}}</td>
                    <td class="d-flex gap-2">
                    <a href="{{route('Inmobiliarias.edit',['inmo'=>$inmo->inmoId])}}" class="btn btn-sm button">Editar</a>

                    <form action="{{route('Inmobiliarias.destroy',['inmo'=>$inmo->inmoId])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger">
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    @endauth
</div>

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



@endsection
