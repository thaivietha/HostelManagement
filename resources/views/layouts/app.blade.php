<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="Hệ thống quản lý và tra cứu thông tin nhà trọ">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Hệ thống quản lý và tra cứu</title>

        @section('stylesheets')
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}" >
        <style type="text/css">
        body{
            min-height: 100vh;
        }
        .navbar{
            box-shadow: 0 0.5em 1em -0.125em rgb(10 10 10 / 10%), 0 0 0 1px rgb(10 10 10 / 2%);
        }
        </style>
        @show
</head>

<body class="has-background-light">
    
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">
                <i class="fas fa-home"></i>&nbsp;
                    Trang chủ
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample" aria-label="{{ __('Toggle navigation') }}">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                
                    <a class="navbar-item" href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>&nbsp;
                        Quản lý
                    </a>

                    <a class="navbar-item {{request()->is('/') ? 'is-active' : '' }}">
                        <i class="fas fa-search"></i>&nbsp;
                        Tra cứu
                    </a>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <!-- Authentication Links -->

                        <div class="buttons">
                            @guest
                            @if (Route::has('login'))
                            <a class="button is-light" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i>
                            </a>
                            @endif
                            @if (Route::has('register'))
                            <a class="button is-light" href="{{ route('register') }}">
                                {{ __('Đăng ký') }}
                            </a>
                            @endif
                            @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="navbar-dropdown">

                                    <a class="navbar-item">
                                        Tài khoản
                                    </a>
                                    <a class="navbar-item">
                                        Contact
                                    </a>
                                    <hr class="navbar-divider"> <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                                    {{ __('Logout') }}
                                </a>                                      
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </nav>

    <main class="main">
        @yield('content')

    </main>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>
              <strong>System</strong> by <a href="https://facebook.com/thaiviethaa">Thai Viet Ha</a>. The source code is licensed
          </p>
      </div>
  </footer>

</body>
@section('scripts')
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <script src="{{ asset('js/all.js') }}" defer></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->

@show
</html>
