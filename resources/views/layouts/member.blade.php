<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/components.css')}}">

</head>
<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                class="fas fa-search"></i></a></li>
                </ul>
                <div class="search-element">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <div class="d-sm-none d-lg-inline-block">Hi, Admin</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="features-profile.html" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index.html">E - EXPATRIATE</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="index.html">EE</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header" style="color: white">.</li>
                    <li class="nav-item dropdown {{ Request::is('expatriate') ?  'active' : '' || Request::is('expatriate-details') ?  'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown"><i
                                class="fas fa-child"></i><span>Eksaptriat</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('expatriate') }}">Data Ekspatriat</a></li>
                            <li><a class="nav-link" href="{{ route('expatriate-details') }}">Divisi Ekspatriat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('division') ?  'active' : '' || Request::is('division-details') ?  'active' : '' }}">
                        <a href="" class="nav-link has-dropdown"><i
                                class="fas fa-dice-d6"></i><span>Divisi</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('division') }}">Divisi</a></li>
                            <li><a class="nav-link" href="{{ route('division-details') }}">Detail Divisi</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('place') ?  'active' : '' }}">
                        <a href="{{ route('place') }}" class="nav-link"><i
                                class="fas fa-building"></i><span>Data Tempat</span></a>
                    </li>
                    <li class="{{ Request::is('scheduling') ?  'active' : '' }}">
                        <a class="nav-link" href="{{ route('scheduling') }}"><i class="far fa-calendar-check"></i>
                            <span>Penjadwalan</span>
                        </a>
                    </li>
                </ul>
            </aside>
        </div>
        <div class="main-content">
            <section class="section">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2019
            </div>
        </footer>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{asset('js/stisla.js')}}"></script>

<!-- Template JS File -->
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('js/page/index.js')}}"></script>
</body>
</html>
