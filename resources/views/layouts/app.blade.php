<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- pmanager js -->
    <script src="https://use.fontawesome.com/874dbadbd7.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else

                            <li><a class="nav-link" href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i> Companies</a></li>
                            <li><a class="nav-link" href="{{ route('projects.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Projects</a></li>
                            <li><a class="nav-link" href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Tasks</a></li>
@if(Auth::user()->role_id == 1)


<li class="dropdown">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-user" aria-hidden="true"></i>  Admin <span class="caret"></span></a>

    <ul class="dropdown-menu" role="menu">
        <li><a class="nav-link" href="{{ route('projects.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> All Projects</a></li>
        <li><a class="nav-link" href="{{ route('users.index') }}"><i class="fa fa-user" aria-hidden="true"></i> All Users</a></li>
        <li><a class="nav-link" href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> All Tasks</a></li>
        <li><a class="nav-link" href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i> All Companies</a></li>
        <li><a class="nav-link" href="{{ route('roles.index') }}"><i class="fa fa-envelope" aria-hidden="true"></i> All Roles</a></li>

    </ul>
</li>

@endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

        <!-- <main class="py-4"> -->
            <div class="container">
                @include('partials.errors')
                @include('partials.success')
                <div class="row">
                    @yield('content')
                </div>
            </div>
            
        <!-- </main> -->
    </div>
</body>
</html>
