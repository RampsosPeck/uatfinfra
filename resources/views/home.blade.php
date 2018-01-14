<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Welcome to George Peralta's website">
    <meta name="author" content="Ing. George Peralta">
  
    <title>U.A.T.F. | Infraestructura</title>

      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      {!! Html::style('/dashboard/bootstrap/css/bootstrap.min.css') !!}
      <!-- Font Awesome -->
      {!! Html::style('/dashboard/css/font-awesome.min.css') !!}
      <!-- Ionicons -->
      {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}
      

      @stack('styles')

      <!-- Theme style -->
      {!! Html::style('/dashboard/css/AdminLTE.min.css') !!}
      
      {!! Html::style('/dashboard/css/skins/skin-blue.min.css') !!}

      <link rel="shortcut icon" href="{!! URL::to('/img/favicon.png') !!}" />

    </head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>UATF</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><font color="#fed136"><b>Depto.</b> Infraestructura</font></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            @yield('menu-messages')
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
             @yield('menu-notification')
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            @yield('menu-task')
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="/dashboard/img/user.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><strong>{{ Auth::user()->name }}  <font color="#F44336">({{ mb_strtoupper(Auth::user()->type, 'UTF-8') }})</font></strong></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="/dashboard/img/user.png" class="img-circle" alt="User Image">

                <p>
                  <font color="yellow"> {{ Auth::user()->name }}</font> <br> <strong>{{ Auth::user()->position }}</strong>
                  <small> <font color="yellow"><b>Potosí 26 de Dic. 2017</b></font> </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    @if (session()->has('impersonator_id'))
                        <center>
                          <form class="navbar-form " action="{{ route('impersonations.destroy') }}" method="POST" accept-charset="utf-8">{{ csrf_field() }} {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-xs btn-danger">Dejar de personificar</button>
                          </form>
                        </center>
                    @else
                      <a href="#">Friends</a>
                    @endif
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                        <a href="{{ url('/logout') }}" 
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"
                                     class="btn btn-danger btn-flat">
                            Salir
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            @yield('icon-sidebar')
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/uatf.jpg" class="img-circle" alt="User Image" align="center" max-width="100px">
        </div>
        <div class="pull-left info">
          <!-- Status -->
          <center><i class="fa fa-circle text-success"></i>{{ Auth::user()->type }} <br> <font color="#fed136"><strong>{{ Auth::user()->position }}</strong></font></center>
        </div>
      </div>


      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      @yield('sidebar-menu')
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('content-header')
    </section>

    <!-- Main content -->
    <section class="content">

      @if(session()->has('flash'))
     
            <div class="alert alert-success">
              {{ session('flash') }}
            </div>
          
      @endif
      <!-- Your Page Content Here -->
      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        <strong>Copyright &copy;<a href="https://www.facebook.com/jorge.peralta.3576224" target="__blank"> <font color="#f39c12"> Ing. Jorge Peralta</font><i class="fa fa-android fa-spin fa-1x fa-fw"></i> </a></strong>
    </div>
    <!-- Default to the left -->
    <strong>U.A.T.F. - 2018</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      @yield('content-sidebar')
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
{!! Html::script('/dashboard/jQuery/jquery-2.2.3.min.js') !!}
<!-- Bootstrap 3.3.6 -->
{!! Html::script('/dashboard/bootstrap/js/bootstrap.min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('/dashboard/js/app.min.js') !!}

@stack('scripts')



  
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
