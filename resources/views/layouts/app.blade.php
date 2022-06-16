
<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="">
      <title>Projeto Santins</title>
      
      <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/product/">
      
      <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      
      <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/c0c4526576.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/ui.js') }}"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>


</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-white bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
              
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-evenly flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{ route('home') }}">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{ route('search') }}">Buscar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{ route('add') }}">Adicionar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{ route('showInscriptions') }}">Minhas inscrições</a>
                </li>
                <!-- Authentication Links -->
                
                    @guest
                        @if (Route::has('login'))
                            
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        
                        @endif

                        @if (Route::has('register'))
                            
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            
                        @endif
                        @else
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            <div class="dropdown">
                                <a class="nav-link text-center dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                               
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                 </form> 
                                </ul>
                              </div>
                         
                
                @endguest
              </ul>
            </div>
          </div>
        </div>
      </nav>

<main>
    @yield('content')
</main>

<footer class="container py-5">
  <div class="d-flex justify-content-center">
      <p>&copy; Todos os direitos reservados - {{ date('Y')}} - Desenvolvido por Carolina Vitt</p>
    </div>
</footer>


</body>
</html>
