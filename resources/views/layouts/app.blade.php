<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Blog') }}</title>

      <!-- Scripts
      <script src="{{ asset('js/app.js') }}" defer></script>-->

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- Styles
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

      <style>
        a.btn-info {
          color: #ffffff
        }
      </style>
      @yield('css')

    </head>
  <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Blog') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('users.editProfile') }}">
                                        My Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

          @auth

            <div class="container">

              @if(session()->has('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}
                </div>
              @endif

              @if(session()->has('error'))
                <div class="alert alert-danger">
                  {{ session()->get('error') }}
                </div>
              @endif

              <div class="row">

                <div class="col-md-4">

                  <ul class="list-group">

                    @if(auth()->user()->isAdmin())

                        <li class="list-group-item">

                          <a href="{{ route('users.index') }}">Users</a>

                        </li> <!-- end li list group item -->

                    @endif

                    <li class="list-group-item">

                      <a href="{{ route('tags.index') }}">Tags</a>

                    </li> <!-- end li list group item -->

                    <li class="list-group-item">

                      <a href="{{ route('posts.index') }}">Posts</a>

                    </li> <!-- end li list group item -->

                    <li class="list-group-item">

                      <a href="{{ route('categories.index') }}">Categories</a>

                    </li> <!-- end li list group item -->



                  </ul> <!-- end ul list group -->

                  <ul class="list-group mt-5">

                      <li class="list-group-item">

                        <a href="{{ route('trashed-posts.index') }}">Trashed Posts</a>

                      </li> <!-- end li list group item -->

                    </ul> <!-- end ul list group -->

                </div> <!-- end col-md-4 -->

                <div class="col-md-8">

                 @yield('content')

                </div> <!-- end col-md-8 -->

              </div> <!-- end row -->

            </div> <!-- end container -->

          @else

            @yield('content')

          @endauth

        </main>

        <!-- Footer -->
        <footer class="footer">

          <div class="container">

            <div class="row gap-y align-items-center">

              <div class="col-3 col-lg-3">

                <a href="{{ route('admin.privacy')}}">Privacy</a>

              </div>

              <div class="col-3 col-lg-3">

                <a href="{{ route('admin.contact')}}">Contact Us</a>

              </div>

              <div class="col-6 col-lg-3 text-right order-lg-last">

                <div class="social">

                  <a class="social-facebook" href="https://www.facebook.com/johnthurlby.589"><i class="fa fa-facebook mr-4"></i></a>
                  <a class="social-twitter" href="https://twitter.com/johnrthurlby1"><i class="fa fa-twitter mr-4"></i></a>
                  <a class="social-instagram" href="https://www.instagram.com/robthurlby/"><i class="fa fa-instagram"></i></a>

                </div>

              </div>

            </div>
          </div>
        </footer><!-- /.footer -->
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    @yield('scripts')

  </body>
</html>
