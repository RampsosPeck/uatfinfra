<!-- Menu Toggle Button -->
<?php use Uatfinfra\ModelAutomotores\Viaje; use Uatfinfra\ModelAutomotores\Informe; ?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-flag-o"></i>
  <?php 
    $viajes = Viaje::where('created_at','<','31-12-'.date('Y'))->get(); $tot = 0;
      foreach($viajes as $viaje)
      { 
          if( (Informe::where('viaje_id',$viaje->id)->get())->isEmpty()) 
          {
              $tot++;
          }
           
      }
      $infor = Informe::where('created_at','<','31-12-'.date('Y'))->count();
  ?>
  <span class="label label-danger">{{ $tot }}</span>
</a>
<ul class="dropdown-menu" style="background-color:#fce3e7;">
  <li class="header" style="background-color:#f59eac;" >Tienes {{ $tot }} tareas</li>
  <li>
    <!-- Inner menu: contains the tasks -->
    <ul class="menu">
      <li><!-- Task item -->
        <a href="#">
          <!-- Task title and progress text -->
          <h3>
            Informes Realizados {{ $infor }}
            <small class="pull-right">{{ $viajes->count() }}</small>
          </h3>
          <!-- The progress bar -->
          <div class="progress xs">
            <!-- Change the css width attribute to simulate progress -->
            <div class="progress-bar progress-bar-red" style="width: 50%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
              <span class="sr-only">20% Completado</span>
            </div>
          </div>
        </a>
      </li>
      <!-- end task item -->
    </ul>
  </li>
  <li class="footer">
    <a href="#">Lista de tareas</a>
  </li>
</ul>