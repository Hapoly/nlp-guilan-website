<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>
      @hasSection('title')
        @yield('title') - {{ config('app.name', 'Laravel') }}
      @else
        {{ config('app.name', 'Laravel') }}
      @endif
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color:#450b06;">
      <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('normal.authors') }}">People</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('normal.publications') }}">Publications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('normal.datasets') }}">Datasets</a>
          </li>
          @auth
            @if(Auth::user()->has_permission('admin'))
              <div class="dropdown-divider"></div>
              <li class="nav-item d-block d-lg-none d-xl-none"><a class="nav-link" href="{{ url('admin/pages/') }}">Pages</a></li>
              <li class="nav-item d-block d-lg-none d-xl-none"><a class="nav-link" href="{{ url('admin/slides/') }}">Slides</a></li>
              <li class="nav-item d-block d-lg-none d-xl-none"><a class="nav-link" href="{{ url('admin/publications/') }}">Publications</a></li>
              <li class="nav-item d-block d-lg-none d-xl-none"><a class="nav-link" href="{{ url('admin/authors/') }}">Authors</a></li>
              <li class="nav-item d-block d-lg-none d-xl-none"><a class="nav-link" href="{{ url('admin/datasets/') }}">Datasets</a></li>
            @endif
            <div class="dropdown-divider"></div>
            <li class="d-block d-lg-none d-xl-none">
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                logout( {{Auth::user()->name}} )
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </form>
            </li>
          @endauth
        </ul>
        @guest
          <ul class="navbar-nav float-right">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
          </ul>
        @else
          <ul class="navbar-nav float-right d-none d-lg-block d-xl-block">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @if(Auth::user()->has_permission('admin'))
                  <a class="dropdown-item" href="{{ url('admin/pages/') }}">Pages</a>
                  <a class="dropdown-item" href="{{ url('admin/slides/') }}">Slides</a>
                  <a class="dropdown-item" href="{{ url('admin/publications/') }}">Publications</a>
                  <a class="dropdown-item" href="{{ url('admin/authors/') }}">Authors</a>
                  <a class="dropdown-item" href="{{ url('admin/datasets/') }}">Datasets</a>
                  <a class="dropdown-item" href="{{ url('admin/dataset-requests/') }}">Dataset Requests</a>
                  <div class="dropdown-divider"></div>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}" 
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
              </div>
            </li>
          </ul>
        @endguest
      </div>
    </nav>
    <div class="container-fluid" style="margin-bottom: 80px;">
      @yield('content')
    </div>
    <nav class="navbar navbar-dark fixed-bottom" style=" background-color:#450b06;">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <img src="http://www.fiberopticlighting.com/image/lighting-kits/unlimited-light-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          <img src="http://www.fiberopticlighting.com/image/lighting-kits/unlimited-light-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        </li>
      </ul>
      <ul class="navbar-nav float-right">
        <li class="nav-item">
          <a class="nav-link"href="https://github.com/Hapoly">
            designed by hapoly
          </a>
        </li>
      </ul>
    </nav>
  </body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
</html>