<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Proj-RSE</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
      <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
      <a class="navbar-brand app-header__logo" href="{{ url('/') }}">
                    Mini-RSE
                </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
        
        <!-- User Menu-->
        @if (Auth::guest())
                        @else
        <li class="dropdown "><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><img class="app-sidebar__user-avatar" width="30" src="http://127.0.0.1:8000/images/userpicture/{{Auth::user()->photo }}" alt="User Image">{{ Auth::user()->name }}</a> 
          <ul class="dropdown-menu settings-menu dropdown-menu-right">

            <li><a class="dropdown-item" href="/profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                       {{ csrf_field() }}
                                    </form>

</li>
          </ul>
        </li>
        @endif
      </ul>

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="50" src="http://127.0.0.1:8000/images/userpicture/{{Auth::user()->photo }}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{Auth::user()->name }}</p>
          <p class="app-sidebar__user-designation">{{Auth::user()->poste}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="/home"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Accueil</span></a></li>

        <li><a class="app-menu__item" href="/profile" ><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Mon profil </span></a>
          
        </li>
        <li><a class="app-menu__item" href="/evenements" ><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Calendrier des événements </span>&nbsp;</a>          
        </li>

        <li><a class="app-menu__item" href="/discusions" ><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Conversation en groupe</span></a>
        </li>

        <li ><a class="app-menu__item" href="/documents" ><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Documents partagés</span></a>
        </li>

        <li ><a class="app-menu__item" href="/projets" ><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">&nbsp;Les projets</span></a>
        </li>

        <li ><a class="app-menu__item" href="/equipes" ><i class="fa fa-users fa-lg"></i><span class="app-menu__label"> &nbsp;Les équipes </span></a>
        </li>
      </ul>
    </aside>

    @yield('content')


    
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('admin/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>