@extends('layout');

@section('main-content')
<div style="margin-top: -6vh">
    {{-- ATTENTION --}}
    @include('Partials/_heroIndex')
    <div class="aida">
    {{-- INTEREST --}}
        <div class="interest">
            <div class="container container-heading">
                <h2> ¿Soñaste con una casa nueva?  </h2>
                <h3>¡Hazla realidad en 2024!</h3>
                <span>
                    <ul>
                        <li style="list-style:none">Imagina la luz de la mañana entrando por la ventana de tu habitación, iluminando una vista que siempre has deseado.</li>
                        <li style="list-style:none">Imagina noches de película en una sala de estar acogedora que se siente como un abrazo.</li>
                        <li style="list-style:none">Imagina finalmente tener el espacio para todas tus pasiones, pasatiempos y seres queridos.</li>
                    </ul>

                </span>
                <p></p>
                <span>¡Deja de imaginar y empieza a vivir! En este emocionante año nuevo </span>
                <p></p>
                <span>
                    <strong>LivingHouse</strong> está aquí para hacer que la casa de tus sueños sea una realidad.
                </span>
            </div>
        </div>{{-- DESIRE --}}
        <div class="desire" >
            <div class="container container-heading">
                <h2>Somos más que agentes inmobiliarios</h2>
                <span>
                    Somos constructores de hogares. Sabemos que comprar o vender una propiedad puede ser abrumador, por eso estamos aquí para guiarte en cada paso del camino.
                </span>
                <p></p>
                <h3>Te ofrecemos:</h3>
                <ul>
                    <li style="list-style:none">
                        Una cartera diversa de hermosas propiedades: Desde acogedores condominios urbanos hasta extensas haciendas suburbanas, tenemos algo para cada sueño y presupuesto.
                    </li>
                    <li style="list-style:none">
                        Agentes expertos que escuchan y comprenden tus necesidades: No solo vendemos casas, construimos relaciones.
                    </li>
                    <li style="list-style:none">
                        Proceso de transacción sin problemas: Nos encargamos de todo el papeleo y el trabajo preliminar, para que puedas concentrarte en la emoción de mudarte.
                    </li>
                    <li style="list-style:none">
                        Compromiso inquebrantable con tu satisfacción: No estamos contentos hasta que estés encantado con tu nuevo hogar.
                    </li>
                </ul>
            </div>
        </div>
        {{-- ACTION  --}}
        <div class="action">
            <div class="action-col">
                <div class="container">
                    <div class="text-center contact">
                        <a href="{{route('Contact')}}">
                            <span class="material-symbols-outlined" style="color:#E8BC15; font-size:5rem">book_4</span>
                        </a>
                    </div>
                    <div class="text-center">
                        <span>
                            ¿Estás listo para convertir tu sueño en tu dirección?
                        </span>
                        <p> Contáctanos hoy mismo para una consulta gratuita y hagamos que 2024 sea el año en que encuentres la casa de tus sueños.</p>
                    </div>
                </div>
            </div>
            <div class="action-col">
                <div class="container">
                    <div class="text-center contact">
                        <a href="tel:+4794117466">
                            <span class="material-symbols-outlined" style="color:#E8BC15; font-size:5rem;">
                                ring_volume
                            </span>
                        </a>
                    </div>
                    <div class="text-center">
                        <span>
                            Llámanos para explorar anuncios, recorrer vecindarios y dar el primer paso hacia la casa de tus sueños.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end AIDA -->
</div><!-- end main content -->

@endsection


