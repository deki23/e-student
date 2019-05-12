<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-student') }}</title>

    <!-- Styles -->
    <link href="{{ elixir("css/app.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      @if (Auth::guest())
                      @else
                      <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                            data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fas fa-users"></i> Users <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{route('register')}}">Add user</a></li>
                              <li><a href="{{route('users.index')}}">All users</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle"
                              data-toggle="dropdown" role="button" aria-expanded="false">
                              <i class="fas fa-user-graduate"></i> Students <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('students.create')}}">Add student</a></li>
                                <li><a href="{{route('students.index')}}">All students</a></li>
                              </ul>
                          </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle"
                              data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fas fa-clipboard-list"></i> Subjects <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('subjects.create')}}">Add subjects</a></li>
                                <li><a href="{{route('studentsubjects.create')}}">Add subject to student</a></li>
                                <li><a href="{{route('subjects.index')}}">All subjects</a></li>
                              </ul>
                          </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle"
                              data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fas fa-chalkboard-teacher"></i> Exams<span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('exams.index')}}">All exams</a></li>
                              </ul>
                          </li>
                          @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('students/login') }}">Login</a></li>
                        @else

                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  {{ Auth::user()->name }} {{Auth::user()->last_name}}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
