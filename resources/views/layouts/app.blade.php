<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('peoples') }}">People</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('publications') }}">Publications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('datasets') }}">Datasets</a>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <script defer src="{{ asset('js/material.js') }}"></script>
</head>
<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title"></span>
        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation mdl-layout--large-screen-only">
          <a class="mdl-navigation__link" href="{{ route('peoples') }}">People</a>
          <a class="mdl-navigation__link" href="{{ route('publications') }}">Publications</a>
          <a class="mdl-navigation__link" href="{{ route('datasets') }}">Datasets</a>
          @guest
            <a class="mdl-navigation__link" href="{{ route('login') }}">login</a>
            <a class="mdl-navigation__link" href="{{ route('register') }}">register</a>
          @else
            <a class="mdl-navigation__link" href="{{ route('logout') }}" 
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              logout({{Auth::user()->name}})
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
          @endguest
        </nav>
      </div>
    </header>
    @auth
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">{{ config('app.name', 'Laravel') }}</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="{{ url('admin/pages/') }}">Pages</a>
          <a class="mdl-navigation__link" href="{{ url('admin/slides/') }}">Slides</a>
          <a class="mdl-navigation__link" href="{{ url('admin/publications/') }}">Publications</a>
          <a class="mdl-navigation__link" href="{{ url('admin/authors/') }}">Authors</a>
          <a class="mdl-navigation__link" href="{{ url('admin/datasets/') }}">Datasets</a>
        </nav>
      </div>
    @endauth
    <main class="mdl-layout__content">
      <div class="page-content">
        @yield('content')
      </div>
    </main>
  </div>
</body>
</html>
