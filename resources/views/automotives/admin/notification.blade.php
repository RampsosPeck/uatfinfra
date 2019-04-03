<!-- Menu toggle button -->
<?php use Uatfinfra\User; use Uatfinfra\ModelAutomotores\Viaje; use Uatfinfra\ModelServicios\General; use Uatfinfra\ModelSolicitudes\Solicitud; use Uatfinfra\ModelMecanico\Devolucion; ?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-bell-o"></i>
  <?php $users = User::where('created_at','>',date('d-m-Y 00:00:00'))->count(); //dd($users);  
        
        $va = date('d'); if(date('d') <= 21){$ulti = date('Y-m-').intval($va+10);}else{$ulti = date('Y').'-'.intval(date('m')+1).'-'.intval(10);} //dd($ulti);  
        $viajes = Viaje::whereBetween('fecha_inicial', [ date('Y-m-d'), $ulti])->count();

        $generales = General::where('created_at','>',date('d-m-Y 00:00:00'))->count();

        $solici = Solicitud::where('estado','ENVIADO')->count();

        $devolu = Devolucion::where('estado','ENVIADO')->count();

        $total = $users+$viajes+$generales+$solici+$devolu;
  ?>
  <span class="label label-warning">{{ $total }} </span>
</a>
<ul class="dropdown-menu" style="background-color: #fcf8e3">
  <li class="header" style="background-color:#f5e79e;">Tienes {{ $total }} notificaciones</li>
  <li>
    <!-- Inner Menu: contains the notifications -->
    <ul class="menu">
      <li><!-- start notification -->
        <a href="#">
          <i class="fa fa-users text-orange"></i> {{ $users }} nuevos usuarios se registraron hoy
        </a>
      </li>
      <li><!-- start notification -->
        <a href="#">
          <i class="fa fa-plane text-orange"></i> {{ $viajes }} nuevos viajes se aproximan
        </a>
      </li>
      <li><!-- start notification -->
        <a href="#"> 
          <i class="fa fa-snowflake-o text-orange"></i> {{ $generales }} trabajos para Servicios Generales
        </a>
      </li>
      <li><!-- start notification -->
        <a href="#"> 
          <i class="fa fa-bus text-orange"></i> {{ $solici }} trabajos para el Mecánico de Buses
        </a>
      </li>
      <li><!-- start notification -->
        <a href="#"> 
          <i class="fa fa-exchange text-orange"></i> {{ $devolu }} nuevas devoluciones de material
        </a>
      </li>
      <!-- end notification -->
    </ul>
  </li>
  <li class="footer"><a href="#">Lista Total {{ $total }}</a></li>
</ul>