<?php use Uatfinfra\User;
use Uatfinfra\ModelAutomotores\Viaje;
?>
<!-- Create the tabs -->
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-bus-tab" data-toggle="tab"><i class="fa fa-hand-o-up"></i></a></li>
    <li><a href="#control-sidebar-hand-tab" data-toggle="tab"><i class="fa fa-hand-o-right"></i></a></li>
    <li><a href="#control-sidebar-hand1-tab" data-toggle="tab"><i class="fa fa-hand-o-left"></i></a></li>
    <li><a href="#control-sidebar-hand2-tab" data-toggle="tab"><i class="fa fa-thumbs-o-up"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-bus-tab">
        <h3 class="control-sidebar-heading text-center">Rol de Viajes CIUDAD</h3>
        
        <ul class="control-sidebar-menu">
          <li>
            <?php $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->where('entidad','Depto. de Infraestructura')->orderBy('grade','ASC')->get();
                  $viajes = Viaje::where('estado','activo')->get();?>

                  @foreach($choferes as $key => $chofer)                
                      <td> <font color="#00c0ef"> {{ $chofer->name }} </font></td>
                      <?php $totalvi = 0; $ciudad = \DB::table('users')
                          ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
                          ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
                          ->join('tipo_viaje', 'viajes.id', '=', 'tipo_viaje.viaje_id')
                          ->select('users.*', 'viajes.*','tipos.*')
                          ->where('users.id',$chofer->id)
                          ->where('tipo_viaje.tipo_id',1)
                          ->count(); ?> 
                      <?php $permi1 = \DB::table('permiviajes')
                          ->where('permiviajes.user_id',$chofer->id)
                          ->where('tipo',1)
                          ->count(); ?>  
                      <td class="pull-right"> <font color="#f4645f">{{ $ciudad+$permi1 }}</font> </td><br> <br> 
                  @endforeach
               
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-hand-tab">  
          <h3 class="control-sidebar-heading text-center">Rol de Viajes Sub Sede</h3>
          <ul class="control-sidebar-menu">
            <li>
                <?php $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->where('entidad','Depto. de Infraestructura')->orderBy('grade','ASC')->get();
                  $viajes = Viaje::where('estado','activo')->get();?>

                  @foreach($choferes as $key => $chofer)                
                      <td> <font color="#00c0ef"> {{ $chofer->name }} </font></td>
                      <?php $totalvi = 0; $ciudad = \DB::table('users')
                          ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
                          ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
                          ->join('tipo_viaje', 'viajes.id', '=', 'tipo_viaje.viaje_id')
                          ->select('users.*', 'viajes.*','tipos.*')
                          ->where('users.id',$chofer->id)
                          ->where('tipo_viaje.tipo_id',2)
                          ->count(); ?> 
                      <?php $permi2 = \DB::table('permiviajes')
                          ->where('permiviajes.user_id',$chofer->id)
                          ->where('tipo',2)
                          ->count(); ?>  
                      <td class="pull-right"> <font color="#f4645f">{{ $ciudad+$permi2 }}</font> </td><br> <br> 
                  @endforeach
            </li>
          </ul>
      </div> 

      <div class="tab-pane" id="control-sidebar-hand1-tab">  
          <h3 class="control-sidebar-heading text-center">Rol de Viajes Provincia</h3>
          <ul class="control-sidebar-menu">
            <li>
                <?php $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->where('entidad','Depto. de Infraestructura')->orderBy('grade','ASC')->get();
                  $viajes = Viaje::where('estado','activo')->get();?>

                  @foreach($choferes as $key => $chofer)                
                      <td> <font color="#00c0ef"> {{ $chofer->name }} </font></td>
                      <?php $totalvi = 0; $ciudad = \DB::table('users')
                          ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
                          ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
                          ->join('tipo_viaje', 'viajes.id', '=', 'tipo_viaje.viaje_id')
                          ->select('users.*', 'viajes.*','tipos.*')
                          ->where('users.id',$chofer->id)
                          ->where('tipo_viaje.tipo_id',3)
                          ->count(); ?> 
                      <?php $permi3 = \DB::table('permiviajes')
                          ->where('permiviajes.user_id',$chofer->id)
                          ->where('tipo',3)
                          ->count(); ?>  
                      <td class="pull-right"> <font color="#f4645f">{{ $ciudad+$permi3 }}</font> </td><br> <br> 
                  @endforeach
            </li>
          </ul>
      </div>

      <div class="tab-pane" id="control-sidebar-hand2-tab">  
          <h3 class="control-sidebar-heading text-center">Rol de Viajes Apoyo</h3>
          <ul class="control-sidebar-menu">
            <li>
                <?php $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->where('entidad','Depto. de Infraestructura')->orderBy('grade','ASC')->get();
                  $viajes = Viaje::where('estado','activo')->get();?>

                  @foreach($choferes as $key => $chofer)                
                      <td> <font color="#00c0ef"> {{ $chofer->name }} </font></td>
                      <?php $totalvi = 0; $ciudad = \DB::table('users')
                          ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
                          ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
                          ->join('tipo_viaje', 'viajes.id', '=', 'tipo_viaje.viaje_id')
                          ->select('users.*', 'viajes.*','tipos.*')
                          ->where('users.id',$chofer->id)
                          ->where('tipo_viaje.tipo_id',4)
                          ->count(); ?> 
                      <?php $permi4 = \DB::table('permiviajes')
                          ->where('permiviajes.user_id',$chofer->id)
                          ->where('tipo',4)
                          ->count(); ?>  
                      <td class="pull-right"> <font color="#f4645f">{{ $ciudad+$permi4 }}</font> </td><br> <br> 
                  @endforeach
            </li>
          </ul>
      </div>
</div>