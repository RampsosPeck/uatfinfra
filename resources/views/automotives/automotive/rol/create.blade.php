@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
<?php use Carbon\Carbon;?>
<div class="box box-primary">
    <div class="box-header with-border ">
        <center>
          <h3 class="box-title">
            <font color="#007bff"><b>DETALLE DE VIAJE DEL CONDUCTOR</b></font> {{ $user->name }}
          </h3>
        </center>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="vehiculo-table" class="table table-bordered table-striped " style="background-color:#d9edf7">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Entidad</th>
                        <th>Detalle</th>
                        <th>Partida</th>
                        <th>Hora</th>
                        <th>Llegada</th>
                        <th>Hora</th>
                        <th>Tipo</th>                                            
                    </tr>
                </thead>
                <tbody bgcolor="#d9edf7" >
                    @foreach($viajes as $key => $viaje)
                    <tr>
                        <td class="text-center"> {{ ++$key }} </td>
                        <td class="text-center"> {{ $viaje->codigo }}</td>
                        <td class="text-center"> {{ $viaje->entidad }}</td>
                        <?php $destino1 = \DB::table('destinos')
                            ->where('id',$viaje->destino1)
                            ->first();
                            $destino2 = \DB::table('destinos')
                            ->where('id',$viaje->destino2)
                            ->first();
                            $destino3 = \DB::table('destinos')
                            ->where('id',$viaje->destino3)
                            ->first();
                            $destino4 = \DB::table('destinos')
                            ->where('id',$viaje->destino4)
                            ->first();
                            $destino5 = \DB::table('destinos')
                            ->where('id',$viaje->destino5)
                            ->first();
                            $destino6 = \DB::table('destinos')
                            ->where('id',$viaje->destino6)
                            ->first(); ?>
                        <td class="text-center"> {{ $destino1->destino }} / {{ $destino2->destino }} / @if(!empty($destino3))
                                    {{ $destino3->destino }} /
                                @endif()
                                @if(!empty($destino4))
                                    {{ $destino4->destino }} /
                                @endif()
                                @if(!empty($destino5))
                                    {{ $destino5->destino }} /
                                @endif()
                                @if(!empty($destino6))
                                    {{ $destino6->destino }} 
                                @endif()
                        </td>
                        <td class="text-center">{{ Carbon::parse($viaje->fecha_inicial)->format('Y-m-d') }}</td>
                        <td class="text-center">{{ $viaje->horainicial }}</td>
                        <td class="text-center">{{ Carbon::parse($viaje->fecha_final)->format('Y-m-d') }}</td>
                        <td class="text-center">{{ $viaje->horafinal }}</td>
                        <?php $tipos = \DB::table('tipo_viaje')
                            ->join('tipos', 'tipo_viaje.tipo_id', '=', 'tipos.id')
                            ->select('tipo_viaje.*','tipos.*')
                            ->where('tipo_viaje.viaje_id',$viaje->id)
                            ->get(); ?>
                        <td class="text-center" bgcolor="#dff0d8" >@foreach($tipos as $key => $tipo) {{ $tipo->nombre }} / @endforeach </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>                  
    </div>
    <div class="box-footer text-center">
        Total viajes {{ $viajes->count() }}
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