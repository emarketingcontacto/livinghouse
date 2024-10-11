<div class="d-flex justify-content-center align-items-center">
    <label style="color:#e1e1e1; margin-right:1vw; margin-left:3vw; font-size:.7rem">Colonia:</label>
	<form action="{{route('Casas')}}" method="GET" class="mt-2">
        @csrf
        @method('GET')
        <select name="propneighborhood" class="dropdown text-center form-control bg-dark" style="width: auto; color:#E8BC15;  border:#E8BC15 solid 1px;  font-size:.7rem" onchange="this.form.submit()">
            <option value="all" selected>--Seleccionar Colonia--</option>
            @foreach ($neighborhoods as $item)
                <option value="{{$item->propNeighborhood}}" {{$item->propNeighborhood === '$item->propNeighborhood' ? 'selected' : ''}} > {{$item->propNeighborhood}}</option>
            @endforeach
        </select>
    </form>
</div>
