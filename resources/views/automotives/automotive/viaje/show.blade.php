@extends('automotives.layout')

@section('content')
<?php use Carbon\Carbon; 
use Uatfinfra\ModelAutomotores\Destino; ?>
<div class="box box-primary">
    <div class="box-header with-border">
      <center><h3 class="box-title"><b>DATOS DEL VIAJE</b></h3></center>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin text-center">
                <thead>
                  <tr>
                    <th>Encargado</th>
                    <th>Tipo</th>
                    <th>Entidad</th>
                    <th>Dias/Pax</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>{{ $viaje->encargado_id }}</td>
                      <td>{{ $viaje->tipo }}</td>
                      <td>{{ $viaje->entidad }}</td>
                      <td>{{ $viaje->dias }} Pasajeros: {{ $viaje->pasajeros }}</td>
                      <td>{{ Carbon::parse($viaje->fecha_inicial)->format('Y-m-d')}} {{ $viaje->horainicial }}</td>
                      <td>{{ Carbon::parse($viaje->fecha_final)->format('Y-m-d')}} {{ $viaje->horafinal }}</td>
                  </tr>
                </tbody>
            </table>
            <table class="table no-margin text-center">
                <thead>
                  <tr>
                    <th>Vehículo</th>
                    <th>Categoria</th>
                    <th>Recursos</th>
                    <th>Reserva</th>
                    <th>Estado</th>
                    <th>Nota</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>{{ $viaje->vehiculo->placa }}</td>
                      <td>{{ $viaje->categoria }}</td>
                      <td>{{ $viaje->recurso }}</td>
                      <td>{{ $viaje->reserva }}</td>
                      <td>{{ $viaje->estado }}</td>
                      <td>{{ $viaje->nota }}</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="box-footer clearfix">
      {!!link_to_route('viajes.edit', $title = ' Editar el viaje', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-info btn-sm btn-flat pull-left glyphicon glyphicon-pencil','onClick'=>'javascript: return confirm("¿Estas seguro de EDITAR el viaje?");'])!!}
      {!!link_to_route('viajes.show', $title = ' Imprimir Presupuesto', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-warning btn-sm btn-flat pull-right glyphicon fa fa-print','target'=>'_blank'])!!}
      {!!link_to_route('calendario.edit', $title = ' Hoja de Ruta', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-primary btn-sm btn-flat pull-right glyphicon fa fa-print','target'=>'_blank'])!!}
    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
      <center><h3 class="box-title"><b>DATOS DEL PRESUPUESTO Y RUTAS</b></h3></center>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin text-center">
                <thead>
                  <tr>
                    <th>Litros</th>
                    <th>Precio</th>
                    <th>Peaje</th>
                    <th>Garaje</th>
                    <th>Otros</th>
                    <th>V. Ciudad</th>
                    <th>V. Provincia</th>
                    <th>V. Frontera</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>{{ $presupuesto->totalcombu }}</td>
                      <td>{{ $presupuesto->totalprecio }}</td>
                      <td>{{ $presupuesto->totpeaje }}</td>
                      <td>{{ $presupuesto->totgaraje }}</td>
                      <td>{{ $presupuesto->totmate }}</td>
                      <td>{{ $presupuesto->totviaciu }}</td>
                      <td>{{ $presupuesto->totviapro }}</td>
                      <td>{{ $presupuesto->totviafro }}</td>
                  </tr>
                </tbody>
            </table>
            <table class="table no-margin text-center">
                <thead>
                  <tr>
                    <th>Ruta 1</th>
                    <th>Ruta 2</th>
                    <th>Ruta 3</th>
                    <th>Ruta 4</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <?php $r1 = Destino::where('id',$ruta->destino1)->first();?>
                      <?php $r2 = Destino::where('id',$ruta->destino2)->first();?>
                      <?php $r3 = Destino::where('id',$ruta->destino3)->pluck('destino');
                           if(empty($r3[0])) { $r3=0; }?>
                      <?php $r4 = Destino::where('id',$ruta->destino4)->pluck('destino');
                           if(empty($r4[0])) { $r4=0; }?>
                      <td>{{ $r1->destino }} km.:{{ $ruta->kilo1 }}</td>
                      <td>{{ $r2->destino }} km.:{{ $ruta->kilo2 }}</td>
                      <td>{{ $r3[0] }} km.:{{ $ruta->kilo3 }}</td>
                      <td>{{ $r4[0] }} km.:{{ $ruta->kilo4 }}</td>
                  </tr>
                </tbody>
            </table>
            <table class="table no-margin text-center">
                <thead>
                  <tr>
                    <th>Ruta 5</th>
                    <th>Ruta 6</th>
                    <th>Adicional</th>
                    <th>Total km.</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <?php $r5 = Destino::where('id',$ruta->destino5)->pluck('destino');
                            if(empty($r5[0])) { $r5=0; }?>
                      <?php $r6 = Destino::where('id',$ruta->destino6)->pluck('destino');
                            if(empty($r6[0])) { $r6=0; }?>
                      <td>{{ $r5[0] }} km.:{{ $ruta->kilo5 }}</td>
                      <td>{{ $r6[0] }} km.:{{ $ruta->kilo6 }}</td>
                      <td>{{ $ruta->adicional }}</td>
                      <td>{{ $ruta->totalkm }}</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@push('styles')
   
@endpush

@push('scripts') 
   
<script>

</script>
    
@endpush