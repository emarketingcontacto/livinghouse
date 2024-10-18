@php
    $galleryInmo = DB::table('images')
    ->where('propId', '=', $propID)
    ->get();
@endphp

<div class="property-gallery">
    @foreach ($galleryInmo as $image)
    <a onclick="openWindow(`{{asset('storage/'.$image->imageName)}}`)">
        <img src="{{asset('storage/'.$image->imageName)}}" width="180" height="160">
    </a>

    <script>
        function openWindow(url){
            const screenX = (window.innerHeight/2);
            const topX= (window.innerWidth)/2;
            const winWidth= window.innerWidth;
            const winHeight = window.innerHeight;
            const target = "_blank";
            const windowfeatures = "screenX="+screenX+",top="+topX+",width="+winWidth+",height="+winHeight;

            window.open(url,target,windowfeatures);
        }

    </script>

    @endforeach
</div>
