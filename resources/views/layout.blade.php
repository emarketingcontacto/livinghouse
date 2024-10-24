<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <script src="{{asset('script.js')}}"></script>
    <title>Bienes Raices Guanajuato</title>

    {{-- Google Tag --}}
    <meta name="google-site-verification" content="fIu-dd2Yp8kLrUBA04wShh5DSAZVATzoX4VloIpYxjI" />
    {{-- End Google Tag --}}
</head>
<body>
    <Header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('Images/bienes_raices_gto.png')}}" alt="LivingHouse" width="180px" style="border-radius: 50%">
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('Casas')}}">Casas</a>
                  </li>
                  <li class="nav-item">
                    {{-- <a class="nav-link" href="/Departamentos">Departamentos</a> --}}
                    <a class="nav-link" href="{{route('Departamentos.index')}}">Departamentos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('Terrenos')}}">Terrenos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('Comercios')}}">Comercios</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('Inmobiliarias.index')}}">Inmobiliarias</a>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Servicios
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('Asesorias')}}">Asesorías</a></li>
                      <li><a class="dropdown-item" href="{{route('Avaluos')}}">Avalúos</a></li>
                      <li><a class="dropdown-item" href="{{route('Infonavit')}}">Tramites Infonavit</a></li>
                      <li><a class="dropdown-item" href="{{route('Notarial')}}">Tramites Notariales</a></li>
                    </ul>
                  </li>

                  @auth
                  @if (auth()->user()->role ==='admin')
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Control
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('Categories.index')}}">Categorias</a></li>
                        <li><a class="dropdown-item" href="{{route('Biztype.index')}}">Tipos de Negocio</a></li>
                        <li><a class="dropdown-item" href="{{route('Properties.index')}}">Propiedades</a></li>
                        <li><a class="dropdown-item" href="{{route('Inmobiliarias.index')}}">Inmobiliarias</a></li>
                        <li><a class="dropdown-item" href="{{route('Contactos.index')}}">Contactos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('User.index')}}">Usuarios</a></li>
                        </ul>
                    @endif
                    @endauth
                  </li>
                </ul>

                {{-- Auth --}}
                <div class="auth flex-inline">
                    @auth
                        {{-- logged in --}}
                        <div class="d-flex">
                            <span class="sm-span">Bienvenido: {{auth()->user()->username}}</span>
                            <form action="{{route('User.logout')}}" method="post" class="inline">
                                @csrf
                                @method('POST')
                                    <button type="submit" style="border:none" class="bg-light">
                                        <span class="material-symbols-outlined auth-span">logout</span>
                                        <p class="sm-span" style="color:#E8BC15">Salir</p>
                                    </button>
                            </form>
                        </div>

                        {{-- end logged in --}}
                    @else
                        {{-- logged out --}}
                        <a href="{{route('User.login')}}" style="color:#E8BC15">
                            <span class="material-symbols-outlined auth-span" >login</span>
                            <span>Login</span>
                        </a>
                        {{-- logged out --}}
                    @endauth
                </div>
                {{-- End Auth --}}
                </div>
            </div>
        </nav>
    </Header>
    <body>
        <div class="main-content">
            @yield('main-content')
        </div>
    </body>
    <footer>
        @include('Partials/_footer')

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
