<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Prueba desarrollador Agenda de contactos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/validationscripts.js') }}"></script>
        
    </head>
    <body>
        
          <!-- Navigation -->
          <nav class="navbar navbar-expand-lg navbar-dark   bg-dark  fixed-top" >
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}" ><img style="max-width:80px;" src="{{ asset('images/agenda.png') }}"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  @if (Route::has('login'))
                    @auth
                      <li class="nav-item active">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>  
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                    @else
                      <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>  
                      </li>
                    @endauth
                  @endif
                </ul>
              </div>
            </div>
          </nav>
          <br><br><br>
        <section id="breadcrumb">
          <div class="container">
            <ol class="breadcrumb">
              <li class="active">Panel de control @yield('user')</li>
            </ol>
          </div>
        </section>

    <!-- Content -->
        <main class="py-4">
            @yield('content')
        </main>
        <!-- Footer -->
        <footer class="py-5 bg-light text-dark">
          <div class="col-sm-12">
            <p class="text-copyright"><div ALIGN=center>Proyects & Systems</div>
              <div ALIGN=center>NIT <span style="color:#EF7D00">900.271.791-4</span></div>
              <div ALIGN=center>Hecho por Klaus Herbert Thelen como prueba de habilidades como desarrollador</div>
            </p>
            </div> 
        </footer>
    </body>
</html>