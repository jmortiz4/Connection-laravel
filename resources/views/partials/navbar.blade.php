
<header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-primary" style="">
      <a class="navbar-brand text-secondary btn btn-outline-light" href="{{ url('/') }}">Connection</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            @guest
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  text-secondary  btn btn-outline-light" href="#" id="navbarDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Preguntas</a>
                <div class="dropdown-menu bg-dark text-secondary" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-secondary" href="#preguntas">De qué se trata todo esto</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-secondary" href="#tracks">Tracks del Mes</a>
                 
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary  btn btn-outline-light"  href="{{ route('contacto') }}">{{ __('Contacto') }}</a>
              </li>

              @else
                <li class="nav-item">
                  <a class="nav-link  text-secondary  btn btn-outline-light" href="{{ route('posteos') }}">{{ __('Comunidad') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-secondary btn btn-outline-light" href="{{ route('perfil') }}">{{ __('Mi Perfil') }}</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle  text-secondary btn btn-outline-light" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Preguntas</a>
                  <div class="dropdown-menu bg-dark text-secondary" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-secondary" href="#preguntas">De qué se trata todo esto</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-secondary" href="#tracks">Tracks del Mes</a>
                    <div class="dropdown-divider"></div>
                   
                </li>
                <li class="nav-item">
                  <a class="nav-link text-secondary btn btn-outline-light" href="{{ route('contacto') }}">{{ __('Contacto') }}</a>
                </li>
            @endguest

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
          @guest
          
              <li class="nav-item">
                  <a class="btn btn-outline-light" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link btn btn-outline-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
                  @if(Auth::user()->role==9)
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('administrarPosteos') }}">{{ __('Administrar Posteos') }}</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('administrarUsuarios') }}">{{ __('Administrar Usuarios') }}</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              <img style="border-radius:10%" src="{{asset('storage/fotoPerfil/'.Auth::user()->avatar)}}" alt="Avatar">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item btn btn-outline-light" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Salir') }}
                          </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </li>
                    @else
                    <li class="nav-item dropdown ">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-outline-light  " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{-- <img class=" img-fluid"style="border-radius:10%" src="{{asset('storage/fotoPerfil/'.Auth::user()->avatar)}}" alt="Avatar"> --}}
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item btn btn-outline-light" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Salir') }}
                              </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                          </li>
                        @endif

                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> --}}
                </div>

            </li>
          @endguest
        </ul>
      </div>
    </nav>
  </header>