<ul class="sidebar-menu">
    <!-- <li class="header text-center {{ request()->is('home') ? 'active' : '' }}"><a href="{{ URL::to('/home') }}"><b>MENU</b></a></li>
     Optionally, you can add icons to the links -->
    <li class="treeview {{ request()->is('users*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ request()->is('users') ? 'class=active' : '' }}><a href="{!! URL::to('/users') !!}"><i class="fa fa-eye"></i> <b>Listar</b></a></li>
          <li {{ request()->is('users/create') ? 'class=active' : '' }}><a href="{!! URL::to('/users/create') !!}"><i class="fa fa-user-circle-o"></i> <b>Crear</b></a></li>
        </ul>
    </li>

    <li class="treeview {{ request()->is('vehiculos*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-bus"></i> <span>Vehículos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ request()->is('vehiculos') ? 'class=active' : '' }}><a href="{!! URL::to('/vehiculos') !!}"><i class="fa fa-car"></i> <b>Listar</b></a></li>
          <li {{ request()->is('vehiculos/create') ? 'class=active' : '' }}><a href="{!! URL::to('/vehiculos/create') !!}"><i class="fa fa-dashboard"></i> <b>Insertar</b></a></li>
          
        </ul>
    </li>

    <li class="treeview {{ request()->is('destinos*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-map"></i> <span>Destinos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ request()->is('destinos') ? 'class=active' : '' }}><a href="{!! URL::to('/destinos') !!}"><i class="fa fa-bars"></i> <b> Listar</b></a></li>
          <li {{ request()->is('destinos/create') ? 'class=active' : '' }}><a href="{!! URL::to('/destinos/create') !!}"><i class="fa fa-location-arrow"></i> <b> Insertar</b></a></li>
        </ul>
    </li>
    
    <li class="treeview {{ request()->is('viajes*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-calendar"></i> <span>Viajes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ request()->is('viajes') ? 'class=active' : '' }}><a href="{!! URL::to('/viajes') !!}"><i class="fa fa-list-ol"></i> <b> Listar</b></a></li>
          <li {{ request()->is('viajes/create') ? 'class=active' : '' }}><a href="{!! URL::to('/viajes/create') !!}"><i class="fa fa-plane"></i> <b> Insertar</b></a></li>
        </ul>
    </li>

    <li class="treeview {{ request()->is('informes*') ? 'active' : '' }}"">
        <a href="{!! URL::to('/informes') !!}"><i class="fa fa-file-text-o"></i> <span>Informes</span></a>
    </li>

    <li class="treeview {{ request()->is('solicitudes*') ? 'active' : '' }}">
        <a href="{!! URL::to('/solicitudes') !!}"><i class="fa fa-calendar"></i> <span>Solicitud de Trabajo</span></a>
    </li>
    <li class="treeview {{ request()->is('reservas*') ? 'active' : '' }}">
        <a href="{!! URL::to('/reservas') !!}"><i class="fa fa-calendar-check-o"></i> <span>Reserva de Viajes
        </a>
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