<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     @yield('style')
     @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @auth
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        {{ __('Dashboard') }}
                    </a>  
                @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __( 'Welcome') }}
                </a>
                @endauth
              
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        
                 
                    <ul class="navbar-nav mr-auto">
                        @can('Project_Access')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('project.index') }}">{{ __('Project') }}</a>
                        </li>  
                        @endcan
                        @can('Task_Access')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('task.index') }}">{{ __('Task') }}</a>
                        </li>
                        @endcan
                        @can('User_Access')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">{{ __('User') }}</a>
                        </li>
                        @endcan
                        @can('Role_Access')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}">{{ __('Role') }}</a>
                        </li>
                        @endcan
                        @can('Permission_Access')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('permissions.index') }}">{{ __('Permission') }}</a>
                        </li>
                        @endcan
                    </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
    </div>
    @yield('script')
    @livewireScripts
</body>
</html>
