<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('styles')
    <!-- Bootstrap CSS style="background-color: #d3eafa; -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark  shadow-sm" style="background-color: #003366;"  >
    <a class="navbar-brand">Actividades Complementarias</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto  mt-2 mt-lg-0 ">

        <li class="nav-item  style">
            <a class="nav-link" href="{{ route('periodo.index') }}">Periodo</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('actividad.index') }}">Actividad</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tipo_usuario.index') }}">Tipo de usuario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('usuario.index') }}">Usuario</a>
          </li> -->
        </ul>
          <li class="form-inline my-2 my-lg-0">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->usuario_pk }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </div>
  </nav>
  <div class="container mt-3">
    <div class="row">
     <main class="py-4 col-12">
           @yield('content')
     </main>
     </div>
   </div>
</body>
</html>
