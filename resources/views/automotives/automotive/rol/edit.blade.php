@extends('automotives.layout')

@section('content')
@include('alertas.success')


<ul class="nav nav-pills nav-justified">
  <li {{ request()->is('roles') ? 'class=active' : '' }} role="presentation" >
      <a href="{!! URL::to('/roles') !!}"><strong><font color="#011620"> PROVINCIA </font></strong></a>
  </li>
  <li {{ request()->is('roles/create') ? 'class=active' : '' }} role="presentation" >
      <a href="{!! URL::to('/roles/create') !!}"><strong><font color="#011620"> CIUDAD </font></strong></a>
  </li>
  <li {{ request()->is('roles/edit') ? 'class=active' : '' }} role="presentation" >
      <a href="{!! URL::to('/roles/edit') !!}"><strong><font color="#011620"> FRONTERA </font></strong></a>
  </li>
</ul>

<div class="box box-primary">
    
    <div class="box-header with-border ">
        <center>
          <h3 class="box-title">
            <font color="#007bff"><b>ROL DE VIAJES
          </h3><BR>
          Basado en viajes de tipo FRONTERA</b></font>
        </center>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="vehiculo-table" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Conductor</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Cantidad</th>                       
                    </tr>
                </thead>
                <tbody bgcolor="#d9edf7" >
                    @foreach($choferes as $key => $chofer)
                    <tr>
                        <td class="text-center"> {{ ++$key }} </td>
                        <td class="text-center"> {{ $chofer->name }} </td>
                        <td class="text-center"> FRONTERA </td>
                        <?php $user = \DB::table('users')
                            ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
                            ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
                            ->select('users.*', 'viajes.*')
                            ->where('users.id',$chofer->id)
                            ->where('viajes.categoria','frontera')
                            ->count(); ?>
                        <td class="text-center"> {{ $user }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>                  
    </div>
    <div class="box-footer text-center">
        Total viajes en frontera {{ $viaje }}
    </div>
   
</div>



@endsection
