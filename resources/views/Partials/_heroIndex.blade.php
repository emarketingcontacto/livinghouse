<div id="carouselHeroCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>

    </div>

    {{-- carouselImages --}}
    <div class="carousel-inner">

        @php $difPropId = 0;  @endphp

        @php $firtsActiveCarouselCounter = 0; @endphp
        @php $carouselCounter  = 0; @endphp

        @foreach ($imagesHero as $item)

                @if ($difPropId !== $item->propId)

                    @php $carouselCounter += 1;@endphp

                    @if ($carouselCounter < 8)

                        <div @php echo $firtsActiveCarouselCounter == 0 ? 'class="carousel-item active" ': 'class="carousel-item" ';  @endphp  >
                           <img src="{{asset('storage/'.$item->imageName)}}" class="d-block w-100" alt="carrousel_1" width="90%" height="90%">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$item->propName}}</h5>
                                <p>{{$item->propDetails}}</p>
                            </div>
                        </div>

                    @endif

            @endif

            @php $difPropId = $item->propId; @endphp

            @php $firtsActiveCarouselCounter +=1; @endphp



        @endforeach

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
