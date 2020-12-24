<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('layout.dir') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->

    <title>كفاء العضويات</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png')}} " rel="apple-touch-icon">
</head>
<body>
    <div id="app">
      <!-- ======= Header ======= -->
  <header id="header">
        <!-- #nav-menu-container -->
    <div class="container">
                
        <div class="navbar navbar-dark bg-primary">
                    
            <!-- Right Side Of Navbar -->
            <ul class="nav-menu">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                    @if(!auth()->user()->isadmin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.index') }}">الملف الشخصي</a>
                    </li>
                    @endif

                    @if(auth()->user()->isadmin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                    </li>
                    @endif
                @endguest
            </ul>
    
        </div>

                <div class="navbar navbar-dark bg-dark">
                    <div id="logo" class="pull-left">
                        <a href="{{ url('/') }}"><img src=" {{ asset('assets/img/logo.png') }} " alt=""></a>
                    </div>
                 <nav id="nav-menu-container">
                    <ul class="nav-menu">
                            <li class="menu-active"><a href="{{ route('home') }}">الرئيسية</a></li>
                            <li><a href="{{route('subscription.index')}}">عضويات كفاء</a></li>
                            <li><a href="#team">فريق العمل</a></li>
                            <li><a href="#contact">تواصل معنا</a></li>
                    </ul>
                 </nav>
                </div>
            
    </div>

  </header>

  <!-- End Header -->

        <main>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-warning" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul> 
                </div>
            @endif

            @yield('content')
        </main>
    </div>

      <!-- ======= Footer ======= -->
  <footer id="footer" style="bottom:0px">
    <div class="container">
      <div class="row">
        <div class="col-lg text-center">
          <div class="credits">
           تصميم و تطوير : حسان المالكي
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('assets/vendor/hoverIntent/hoverIntent.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>

