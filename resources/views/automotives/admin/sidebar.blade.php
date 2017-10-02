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