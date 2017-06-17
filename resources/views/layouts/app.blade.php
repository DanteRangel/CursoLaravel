<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
     <link href="{{asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
     <link href="{{asset('css/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if(!Auth::guest())
                        @if(Auth::user()->tipo_usuario==1)
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{url('admin/Producto')}}" class="dropdown-item">Producto</a></li>
                            <li><a href="{{url('admin/Empresa')}}" class="dropdown-item">Empresa</a></li>
                            <li><a href="{{url('admin/User')}}" class="dropdown-item">Usuarios</a></li>
                            <li><a href="{{url('admin/Direccion')}}" class="dropdown-item">Direcciones</a></li>
                            <li><a href="{{url('admin/Marca')}}" class="dropdown-item">Marca</a></li>
                            <li><a href="{{url('admin/Grupo')}}" class="dropdown-item">Grupo</a></li>
                          </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('Cotizador')}}" class="nav-link">Cotizador</a>
                        </li>

                    </ul>
                    @endif
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombre }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row" style="margin-top:1em;">
            <div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
                @if(Session::has('update'))
                <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> {{Session::get('update')}}
                </div>
                @endif
                @if(Session::has('delete'))
                    <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> {{Session::get('delete')}}
                    </div>
                @endif
                @if(Session::has('create'))

                    <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> {{Session::get('create')}}
                    </div>
                @endif
            </div>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script> 
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script> 
    @yield('js')
</body>
</html>

