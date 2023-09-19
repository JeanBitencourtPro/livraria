<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <title>Desafio</title>

    <!-- C3 charts css -->
    <link href="{{ asset('plugins/c3/c3.min.css') }}" rel="stylesheet" type="text/css"  />

    <!-- App css -->
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/clima.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>

</head>

<body>
    <div class="modal-loading"></div>
    <div id="app">
        <div id="wrapper">

            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <!-- Image logo -->
                    <a href="{{ route('Dashboard') }}" class="logo">
                        <span>
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="logo-desafio" height="20">
                        </span>
                        <i>
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="28">
                        </i>
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                        </ul>


                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="{{ asset('assets/images/user.png') }}" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>


            <!-- ========== Left Sidebar Start ========== -->
            @include('components.menu')
            <!-- ========== Left Sidebar End ========== -->

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        @include('layouts.notificacao')
                    
                        @yield('content')
                    </div>
                </div>
            </div>

            <footer class="footer text-right">
                @php echo date('Y') @endphp © Jean Bitencourt. - <a target="_blank" href="https://jeanbitencourt.dev">jeanbitencourt.dev</a>
            </footer>
        </div>
    </div>

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>

    <!-- Counter js  -->
    <script src="{{ asset('plugins/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!--C3 Chart-->
    <script type="text/javascript" src="{{ asset('plugins/d3/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/c3/c3.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
</body>

</html>