<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm bd-sidebar2  ">
            <div class="container bd-navbar">
                <a class="navbar-brand" href="{{ url('/') }}">
                <span class="textoBranco"> {{ config('app.name', 'aaaaaaaaaaaa') }} </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ">
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}"><span class="textoBranco">{{ __('Inicio') }}</span></a>
                        </li>
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/exercicios') }}"><span class="textoBranco">{{ __('Exercios') }}</span></a>
                        </li>
                       
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/sugestao') }}"><span class="textoBranco">{{ __('Sugestões') }} </span> </a>
                        </li>
                       
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/register') }}">{{ __('Cadastro') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/perfil') }}">
                                      
                                    {{ Auth::user()->name }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container-fluid geral">

            <div class="row">
               
                <div class="col-12 col-xl-2 col-md-3 filos-laterais bd-sidebar">
                    <nav class="navbar navbar-expand-md navbar-light shadow-sm lateral bd-links ">
                        
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="navbar-collapse collapse" id="navbarToggleExternalContent">
                                <ul class="navbar-nav mr-auto flex-column ">
                                    <li class="nav-item active">
                                        <a class="col vai_filo2"href="{{ url('/cnidarios') }}"><h2 class="filosTextos">cnidarios </h2> </a>
                                    </li>
                                    <li class="nav-item">
                                       
                                            <a class="col vai_filo2"  href="{{ url('/cnidarios') }}"><h2 class="filosTextos">cnidarios</h2> </a>
                                      
                                    </li>
                                    <li class="nav-item">
                                        
                                            <a class="col vai_filo2" href="{{ url('/cnidarios') }}"><h2 class="filosTextos">cnidarios</h2> </a>
                                     
                                    </li>
                                    <li class="nav-item active">
                                        
                                            <a  class="col vai_filo2" href="{{ url('/cnidarios') }}"><h2 class="filosTextos">hpoliferos </h2> </a>
                                      
                                    </li>
                                    <li class="nav-item">
                                            <a  class="col vai_filo2" href="{{ url('/cnidarios') }}"><h2 class="filosTextos">cnidarios</h2> </a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="col vai_filo2"  href="{{ url('/cnidarios') }}"><h2 class="filosTextos">cnidarios</h2> </a>
                                      
                                    </li>
                                    <li class="nav-item active">
                                            <a class="col vai_filo2" href="{{ url('/cnidarios') }}"><h2 class="filosTextos">hpoliferos </h2> </a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="col vai_filo2" href="{{ url('/cnidarios') }}"><h2 class="filosTextos">cnidarios</h2> </a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="col vai_filo2" href="{{ url('/cnidarios') }}"><h2 class="filosTextos">cnidarios</h2> </a>
                                    </li>
                                    <li class="nav-item active">
                                            <a class="col vai_filo2" href="{{ url('/cnidarios') }}"><h2 class="filosTextos">hpoliferosa </h2> </a>
                                    </li>
                                    
                                </ul>
                                    
                                
                            </div>

                            
                        
                        
                        
                      
                        
                    </div>
                    </nav> 
                    <div class="col">
                            @yield('content')
                    </div>
                 
            </div>    
        </div>
            
        </main>
    </div>
</body>
</html>
