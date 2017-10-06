@extends('home')

@section('menu-messages')
<!-- Menu toggle button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-envelope-o"></i>
  <span class="label label-success">4</span>
</a>
<ul class="dropdown-menu">
  <li class="header">You have 4 messages</li>
  <li>
    <!-- inner menu: contains the messages -->
    <ul class="menu">
      <li><!-- start message -->
        <a href="#">
          <div class="pull-left">
            <!-- User Image -->
            <img src="/dashboard/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <!-- Message title and timestamp -->
          <h4>
            Support Team
            <small><i class="fa fa-clock-o"></i> 5 mins</small>
          </h4>
          <!-- The message -->
          <p>Why not buy a new awesome theme?</p>
        </a>
      </li>
      <!-- end message -->
    </ul>
    <!-- /.menu -->
  </li>
  <li class="footer"><a href="#">See All Messages</a></li>
</ul>
@endsection

@section('menu-notification')
<!-- Menu toggle button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-bell-o"></i>
  <span class="label label-warning">10</span>
</a>
<ul class="dropdown-menu">
  <li class="header">You have 10 notifications</li>
  <li>
    <!-- Inner Menu: contains the notifications -->
    <ul class="menu">
      <li><!-- start notification -->
        <a href="#">
          <i class="fa fa-users text-aqua"></i> 5 new members joined today
        </a>
      </li>
      <!-- end notification -->
    </ul>
  </li>
  <li class="footer"><a href="#">View all</a></li>
</ul>
@endsection

@section('menu-task')
<!-- Menu Toggle Button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-flag-o"></i>
  <span class="label label-danger">9</span>
</a>
<ul class="dropdown-menu">
  <li class="header">You have 9 tasks</li>
  <li>
    <!-- Inner menu: contains the tasks -->
    <ul class="menu">
      <li><!-- Task item -->
        <a href="#">
          <!-- Task title and progress text -->
          <h3>
            Design some buttons
            <small class="pull-right">20%</small>
          </h3>
          <!-- The progress bar -->
          <div class="progress xs">
            <!-- Change the css width attribute to simulate progress -->
            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
              <span class="sr-only">20% Complete</span>
            </div>
          </div>
        </a>
      </li>
      <!-- end task item -->
    </ul>
  </li>
  <li class="footer">
    <a href="#">View all tasks</a>
  </li>
</ul>
@endsection

@section('icon-sidebar')
<a href="#" data-toggle="control-sidebar" class="btn btn-lg btn-success"><i class="fa fa-gears fa-spin fa-1x fa-fw" aria-hidden="true"></i></a>
@endsection

@section('sidebar-menu')
    <ul class="sidebar-menu">
        <li class="header text-center">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Crear </a></li>
            <li><a href="{{ route('home.users.index') }}">listar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-bus"></i> <span>Vehículos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Crear</a></li>
            <li><a href="#">listar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-calendar"></i> <span>Calendario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-calendar"></i> <span>Calendario de Viajes</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-user-circle"></i> <span>Rol de viajes</span></a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> <span>Combustibles</span></a></li>
            <li><a href="#"><i class="fa fa-usd"></i> <span>Presupuestos</span></a></li>
            <li><a href="#"><i class="fa fa-file-pdf-o"></i> <span>Informes</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-plane"></i> <span>Viajes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Reservas</a></li>
            <li><a href="#">Crear</a></li>
            <li><a href="#">Listar</a></li>
            <li><a href="#">Destinos</a></li>
            <li><a href="#">Mapas</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-sitemap"></i> <span>Solictud de trabajo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Crear</a></li>
            <li><a href="#">Listar</a></li>
          </ul>
        </li>
    </ul>
@endsection

@section('content-header')
<h1>
  <a class="" href="/home"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Inicio</a>
</h1>
  <ol class="breadcrumb">
    <li><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-users"></i>&nbsp; <b>Personificar</b></a></li>
    <li><a href="#" class="btn btn-sm btn-info"><i class="fa fa-bus"></i>&nbsp; <b>Nuevo Viaje</b></a></li>
    <li><a href="#" class="btn btn-sm btn-primary"><i class="fa fa-calendar"></i>&nbsp; <b>Calendario</b> </a></li>
    <li><a href="#" class="btn btn-sm btn-success"><i class="fa fa-group"></i>&nbsp; <b>Rol de viajes</b></a></li>
    <li><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-tachometer"></i>&nbsp; <b>Combustibles</b></a></li>
    
    <li class="active">Here Conductor</li>
  </ol>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content-sidebar')
<!-- Create the tabs -->
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Rol de Viajes</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cumpleaños de Langdon</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
</div>
@endsection
























<!-- Esto es para el ADMINISTRADOR -->
@if (Auth::user()->type === "Administrator")

        @include('automotives.admin.dashboard')

@endif




<!-- Esto es para el ENCARGADO -->
@if (Auth::user()->type === "Supervisor")  

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el CONDUCTOR -->
@if (Auth::user()->type === "Conductor")

        @include('automotives.automotive.dashboard-conductor')

@endif

<!-- Esto es para el MECANICO -->
@if (Auth::user()->type === "Mecánico")

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el MENSAJERO -->
@if (Auth::user()->type === "Mensajero")

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el DEFAULT -->
@if (Auth::user()->type === "Encargado")

        @include('automotives.automotive.dashboard')

@endif






<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-info">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
           <table class="table table-responsive">
      <caption>Lista de usuarios</caption>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Cédula</th>
          <th>Celular</th>
          <th>Email</th>
          <th>Tipo</th>
          <th>Entidad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->cedula }}</td>
          <td>{{ $user->celular }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->type }}</td>
          <td>{{ $user->entidad }}</td>
          <td>

            @canImpersonate($user->id)      
              <form action="{{ route('impersonations.store') }}" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $user->id }}" >

                <button class="btn btn-info btn-xs ">Personificar</button>
              </form>
            @endcanImpersonate

          </td>
        </tr>
        @endforeach
      </tbody>
    </table></div>
            </div>
        </div>
    </div>
</div>































