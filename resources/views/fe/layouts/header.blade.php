<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Sistem Pengaduan Akademik</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{route('home.index')}}">Home</a></li>
          @if (Auth::check() == null)
            <li><a class="nav-link scrollto" href="{{route('home.login')}}">Login</a></li>
            <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
          @endif
          
          @if (Auth::check())
              <li><a class="getstarted scrollto" href="{{route('akun',Auth::user()->id)}}">Akun</a></li>
          @endif

          @if (Auth::check())
          <li>
            <a class="getstarted scrollto" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
          @endif
            
        
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header>