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

    <li class="treeview">
        <a href="#"><i class="fa fa-plane"></i> <span>Viajes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Crear</a></li>
          <li><a href="#">Listar</a></li>
          <li><a href="#">Destinos</a></li>
          <li><a href="#">Mapas</a></li>
        </ul>
    </li>
    <li class="treeview {{ request()->is('travels*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-calendar"></i> <span>Calendario de Viajes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ request()->is('travels') ? 'class=active' : '' }}><a href="{!! URL::to('/travels') !!}">
            <i class="fa fa-calendar"></i> Calendario de Viajes</a></li>
          <li><a href="#"><i class="fa fa-user-circle"></i> <span>Rol de viajes</span></a></li>
          <li><a href="#"><i class="fa fa-dashboard"></i> <span>Combustibles</span></a></li>
          <li><a href="#"><i class="fa fa-usd"></i> <span>Presupuestos</span></a></li>
          <li><a href="#"><i class="fa fa-file-pdf-o"></i> <span>Informes</span></a></li>
        </ul>
    </li>
    <li class="treeview {{ request()->is('reservas*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-arrow-circle-up"></i> <span>Reserva de Viajes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ request()->is('reservas/create') ? 'class=active' : '' }}><a href="{!! URL::to('/reservas/create') !!}"><i class="fa fa-paper-plane"></i> <b>Crear</b></a></li>
          <li {{ request()->is('reservas') ? 'class=active' : '' }}><a href="{!! URL::to('/reservas') !!}"><i class="fa fa-ellipsis-v"></i> <b>Listar</b></a></li>
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