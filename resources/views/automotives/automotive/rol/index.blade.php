@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
<div class="box box-primary">
    <div class="box-header with-border ">
        <center>
          <h3 class="box-title">
            <font color="#007bff"><b>INFORME GENERAL DE VIAJES</b></font>
          </h3>
        </center>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="vehiculo-table" class="table table-bordered table-striped " style="background-color:#d9edf7">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Conductor</th>
                        <th>Ciudad</th>
                        <th>Sub Sede</th>
                        <th>Provincia</th>
                        <th>Apoyo</th>
                        <th>Total</th> 
                        <th>Viáticos</th>
                        <th>Km. Gastado</th> 
                        <th>Km. Asignado</th>
                        <th>Opciones</th>                                             
                    </tr>
                </thead>
                <tbody bgcolor="#d9edf7" >
                    @foreach($choferes as $key => $chofer)
                    <tr>
                        <td class="text-center"> {{ ++$key }} </td>
                        <td> {{ $chofer->name }} </td>
                        <?php $ciudad = \DB::table('users')
                            ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
                            ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
                            ->join('tipo_viaje', 'viajes.id', '=', 'tipo_viaje.viaje_id')
                            ->select('users.*', 'viajes.*','tipos.*')
                            ->where('users.id',$chofer->id)
                            ->where('tipo_viaje.tipo_id',1)
                            ->count(); ?>
                        <td class="text-center"> {{ $ciudad }} </td>
                        <?php $sub_sede = \DB::table('users')
                            ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
                            ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
                            ->join('tipo_viaje', 'viajes.id', '=', 'tipo_viaje.viaje_id')
                            ->select('users.*', 'viajes.*','tipos.*')
                            ->where('users.id',$chofer->id)
                            ->where('tipo_viaje.tipo_id',2)
                            ->count(); ?>
                        <td class="text-center"> {{ $sub_sede }} </td>
                        <?php $provincia = \DB::table('users')
                            ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
                            ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
                            ->join('tipo_viaje', 'viajes.id', '=', 'tipo_viaje.viaje_id')
                            ->select('users.*', 'viajes.*','tipos.*')
                            ->where('users.id',$chofer->id)
                            ->where('tipo_viaje.tipo_id',3)
                            ->count(); ?>
                        <td class="text-center"> {{ $provincia }} </td>
                        <?php $apoyo = \DB::table('users')
                            ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
                            ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
                            ->join('tipo_viaje', 'viajes.id', '=', 'tipo_viaje.viaje_id')
                            ->select('users.*', 'viajes.*','tipos.*')
                            ->where('users.id',$chofer->id)
                            ->where('tipo_viaje.tipo_id',4)
                            ->count(); ?>
                        <td class="text-center"> {{ $apoyo }} </td>
                        <td class="text-center" bgcolor="#dff0d8" > {{ $ciudad+$sub_sede+$provincia+$apoyo }} </td>
                        <?php $informes = \DB::table('informes')
                            ->where('informes.conductor',$chofer->id)
                            ->where('informes.estado','APROBADO')
                            ->get(); 
                        $viatico = 0; $kilome = 0;   
                        foreach($informes as $key => $informe)
                        {
                            $viatico = $viatico+$informe->viaticos;
                            $kilome  = $informe->kmtotal;    
                        }  
                        ?>
                        <td class="text-center" bgcolor="#fcf8e3" > {{ $viatico }} </td>
                        <td class="text-center" bgcolor="#d9edf7" > {{ $kilome }}  </td>
                        <?php $viajes = \DB::table('viajes')
                            ->join('user_viaje', 'viajes.id', '=', 'user_viaje.viaje_id')
                            ->join('rutas', 'viajes.id', '=', 'rutas.viaje_id')
                            ->select('viajes.*','rutas.*')
                            ->where('user_viaje.user_id',$chofer->id)
                            ->where('viajes.estado','activo')
                            ->get(); 
                        $kilometraje = 0;   
                        foreach($viajes as $key => $viaje)
                        {
                            $kilometraje  = $kilometraje+$viaje->totalkm;    
                        }  
                        ?>
                        <td class="text-center" bgcolor="#f2dede"> {{ $kilometraje }} </td>
                        <td class="text-center">
                            {!!link_to_route('roles.show', $title = ' Mostrar', $parameters = $chofer->id, $attributes = ['class'=>'btn btn-info btn-xs fa fa-pencil-square-o'])!!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>                  
    </div>
    <div class="box-footer text-center">
        Total viajes en provincia 
    </div>
   
</div>
@endsection

@push('styles')
  <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
    table th{
        text-align: center;
    }
  </style>
@endpush