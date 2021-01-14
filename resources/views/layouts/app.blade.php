<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('assets/imagens/aguias.png') }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/jquery.js') }}" defer></script>


    <script src="{{ asset('js/popper.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.mask.js') }}" defer></script>

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/select2.min.js') }}" defer></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}" defer></script> --}}


    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-datepicker.pt-BR.min.js') }}" defer></script>
    <script src="{{ asset('js/raphael.min.js') }}" defer></script>
    <script src="{{ asset('js/morris.min.js') }}" defer></script>

    <script src="{{ asset('js/geral/geralMacara.js') }}" defer></script>
    <script src="{{ asset('js/geralApi.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet" type="text/css">

    <!-- <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img  src="{{ asset('assets/imagens/aguias.png') }}" alt="" width="40" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> --}}
                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                        @else
                        <div class="collapse navbar-collapse" id="navbarNav">

                        </div>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Eventos
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <a class="dropdown-item" href="{{ url('home') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard </a>
                                    <a class="dropdown-item" href="{{ url('/usuarios') }}"><i class="fa fa-address-card" aria-hidden="true"></i> Usuários</a>
                                    <a class="dropdown-item" href="{{ url('/unidades') }}"><i class="fa fa-users" aria-hidden="true"></i> Unidades</a>
                                    <a class="dropdown-item" href="{{ url('/ponto-unidades') }}"><i class="fa fa-money" aria-hidden="true"></i> Pontos de Unidade</a>
                                    <a class="dropdown-item" href="{{ url('/ponto_individuals') }}"><i class="fa fa-money" aria-hidden="true"></i> Pontos Individuais</a>
                                    <a class="dropdown-item" href="{{ url('/eventos') }}"><i class="fa fa-calendar" aria-hidden="true"></i> Eventos</a>
                                    <a class="dropdown-item" href="{{ url('/hora_da_entrada') }}"><i class="fa fa-clone" aria-hidden="true"></i> Integração</a>


                                </div>
                            </li>


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Opções
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off" aria-hidden="true"></i>
                                        {{ __('Logout') }}

                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main >
            @yield('content')
        </main>
    </div>

    @stack('styles')
    @stack('scripts')
</body>
</html>
