<ul class="sidebar-menu">
    <!-- <li class="header text-center {{ request()->is('home') ? 'active' : '' }}"><a href="{{ URL::to('/home') }}"><b>MENU</b></a></li>
     Optionally, you can add icons to the links -->
    
    @can('view', new \Spatie\Permission\Models\Role)
        <li class="treeview {{ request()->is('roless*') ? 'active' : '' }}">
            <a href="{{ route('roless.index') }}"><i class="fa fa-pencil"></i> <span>Roles de Usuarios</span></a>
        </li> 
    @endcan

    @can('view', new \Spatie\Permission\Models\Permission)
        <li class="treeview {{ request()->is('permissions*') ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}"><i class="fa fa-eye"></i> <span>Permisos de Usuarios</span></a>
        </li> 
    @endcan


    <li class="treeview {{ request()->is('users*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ request()->is('users') ? 'class=active' : '' }}><a href="{!! URL::to('/users') !!}"><i class="fa fa-eye"></i> <b>Listar</b></a></li>
          @can('view', new Uatfinfra\User)
            <li {{ request()->is('users/create') ? 'class=active' : '' }}><a href="{!! URL::to('/users/create') !!}"><i class="fa fa-user-circle-o"></i> <b>Crear</b></a></li>
          @else 
            <li {{ request()->is('users/show') ? 'class=active' : '' }}><a href="{{ route('users.show', auth()->user()) }}"><i class="fa fa-user-circle-o"></i> <b>Perfil</b></a></li>
          @endcan
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
    
    <li class="treeview {{ request()->is('reservas*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Reservas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ request()->is('reservas') ? 'class=active' : '' }}><a href="{!! URL::to('/reservas') !!}"><i class="fa fa-bars"></i> <b>Listar </b>
            </a></li>
          <li {{ request()->is('calendario/create') ? 'class=active' : '' }}><a href="{!! URL::to('/calendario/create') !!}"> <i class="fa fa-calendar"></i> <b> Calendario </b></a></li>
        </ul>
    </li>

    <li class="treeview {{ request()->is('solicitudes*') ? 'active' : '' }}">
        <a href="{!! URL::to('/solicitudes') !!}"><i class="fa fa-sitemap"></i> <span>Solicitud de Trabajo</span></a>
    </li>


    <li class="treeview {{ request()->is('mecanicos*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-bus"></i> <span>Mecánico de Buses</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ request()->is('mecanicos') ? 'class=active' : '' }}><a href="{!! URL::to('/mecanicos') !!}"><i class="fa fa-sitemap"></i> <b> Trabajos </b>
            </a></li>
          <li {{ request()->is('mecanicos/create') ? 'class=active' : '' }}><a href="{!! URL::to('/mecanicos/create') !!}"> <i class="fa fa-file-pdf-o"></i> <b> Reportes </b></a></li>
        </ul>
    </li>

     
    <li class="treeview {{ request()->is('pedidos*') ? 'active' : '' }}">
        <a href="{!! URL::to('/pedidos') !!}"><i class="fa fa-cogs"></i> <span>Pedido M. </span>
        </a>
    </li>
    <li class="treeview {{ request()->is('devoluciones*') ? 'active' : '' }}">
        <a href="{!! URL::to('/devoluciones') !!}"><i class="fa fa-cubes"></i> <span>Devolución M. </span>
        </a>
    </li>
    <li class="treeview {{ request()->is('servicios*') ? 'active' : '' }}">
        <a href="{!! URL::to('/servicios') !!}"><i class="fa fa-sitemap"></i> <span>Servicios Generales</span></a>
    </li> 
    
</ul>