
<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.98.0">
      <title>Product example · Bootstrap v5.2</title>
      
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
    
    <header class="site-header sticky-top py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2 d-none d-md-inline-block" href="{{ route('home') }}">Home</a>
            <a class="py-2 d-none d-md-inline-block" href="{{ route('import') }}">Importar</a>
        <a class="py-2 d-none d-md-inline-block" href="{{ route('search') }}">Buscar</a>
        <a class="py-2 d-none d-md-inline-block" href="{{ route('add') }}">Adicionar</a>
        <a class="py-2 d-none d-md-inline-block" href="{{ route('inscription') }}">Minhas inscrições</a>
        
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                  
                @endif

                @if (Route::has('register'))
                    
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    
                @endif
            @else
                
                    <a id="navbarDropdown" class="py-2 d-none d-md-inline-block dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="py-2 d-none d-md-inline-block dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                
            @endguest
      
    </nav>
    </header>

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
