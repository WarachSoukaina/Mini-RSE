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
        @if (Auth::guard('admin')->check())
           <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">Nouvelles notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Il y a des comptes à activer </p>
                    <p class="app-notification__meta">10h30</p>
                  </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>            
        <li class="dropdown">
          <a class="app-nav__item" href="" data-toggle="dropdown" aria-label="Open Profile Menu"><img class="app-sidebar__user-avatar" width="30" src="http://127.0.0.1:8000/images/userpicture/default.jpg" alt="User Image"> {{ Auth::user()->name }}</a>

          <ul class="dropdown-menu settings-menu dropdown-menu-right">

            <li><a class="dropdown-item" href="/admin/profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
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
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name"><img class="app-sidebar__user-avatar" width="50" src="http://127.0.0.1:8000/images/userpicture/default.jpg" alt="User Image">{{Auth::user()->name }}</p>
          <br>
          <p class="app-sidebar__user-designation"> &nbsp;&nbsp;Administrateur </p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="/admin/home"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Accueil</span></a></li>

        <li ><a class="app-menu__item" href="/admin/gestionInfos" ><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Gestion des informations<br> d'entreprise </span></a>
        </li>

        <li><a class="app-menu__item" href="/admin/gestionComptes" ><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Gestion de Comptes </span></a>
          
        </li>
        <li><a class="app-menu__item" href="/admin/gestionEvent" ><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestion des événements </span>&nbsp;</a>          
        </li>

        <li><a class="app-menu__item" href="/admin/gestionGroup" ><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Gestion de Groupes</span></a>
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

<script src="{{asset('admin/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{asset('admin/js/plugins/chart.js')}}"></script>
    <script type="text/javascript">
      var data = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86]
            }
        ]
      };
      var pdata = [
        {
            value: 300,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Complete"
        },
        {
            value: 50,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "In-Progress"
        }
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
  </body>
</html>