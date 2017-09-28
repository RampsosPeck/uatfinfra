@extends('home')

@section('icon-sidebar')
<a href="#" data-toggle="control-sidebar" class="btn btn-lg btn-primary"><i class="fa fa-user-circle-o fa-spin fa-1x fa-fw" aria-hidden="true"></i></a>
@endsection

@section('sidebar-menu')
     <ul class="sidebar-menu">
        <li class="header text-center">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="#"><i class="fa fa-link"></i> <span>Rol de viajes</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Calendario de Viajes</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Informes de Viajes</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Destinos de Viajes</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Ubicaciones de Viajes</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Vehículos</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Solictud de trabajo</span>
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
    <li><a href="#" class="btn btn-xs btn-info"><i class="fa fa-group"></i>&nbsp; Rol de viajes</a></li>
    <li><a href="#" class="btn btn-xs btn-primary"><i class="fa fa-calendar"></i>&nbsp; Calendario</a></li>
    <li><a href="#" class="btn btn-xs btn-success"><i class="fa fa-tachometer"></i>&nbsp; Informes</a></li>
    
    <li class="active">Here Conductor</li>
  </ol>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Conductor</div>

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
        <h3 class="control-sidebar-heading">Ultimos Viajes Realizados</h3>
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
          <h3 class="control-sidebar-heading">Mis Viajes</h3>

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