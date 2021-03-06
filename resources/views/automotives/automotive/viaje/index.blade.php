@extends('automotives.layout')

@section('content')
@include('alertas.success')
<?php use Carbon\Carbon;?>
<div class="container">
    <div class="box box-primary" style="background-color: #E5F2FF;">
        <div class="box-header text-center">

                 {!!link_to_action('ReporteController@getDeclaratoria', $title = ' Declaratorias / Informes', $parameters = ' ', $attributes = ['class'=>'btn btn-sm btn-success fa fa-exclamation-circle pull-right','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Realizar la declaratoria en comisión.' ])!!}
            
            <h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE VIAJES</FONT></b></h3>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
                        <th>Código</th>
                        <th>Cat/Est</th>
                        <th>Conductor</th>
                        <th>Encargado</th>
						<th>Entidad</th>
                        <th>Dias/Pax</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th>Vehiculo</th>
                        <th>Opciones</th>
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($viajes as $key => $viaje)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                    	<td class="text-center">{{ $viaje->codigo }}</td>
                        <td>{{ $viaje->categoria }}/{{ $viaje->estado }}</td>
                        <td>
                            @foreach ($viaje->conductores as $conductor)
                                {{ $conductor->name }}.
                            @endforeach
                        </td>
                        <td>{{ $viaje->encargado->name }}</td>
                        <td>{{ $viaje->entidad }}</td>
                        <td>{{ $viaje->dias }} <b>Pasajeros:</b>{{ $viaje->pasajeros }}</td>
                        <td>{{ Carbon::parse($viaje->fecha_inicial)->format('Y-m-d')}} {{ $viaje->horainicial }}</td>
                        <td>{{ Carbon::parse($viaje->fecha_final)->format('Y-m-d')}} {{ $viaje->horafinal }}</td>
                        <td>{{ $viaje->vehiculo->placa }}</td>
                        <td>
                            {!!link_to_route('viajes.edit', $title = 'Editar', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-primary btn-xs btn-block fa fa-pencil-square-o','onClick'=>'javascript: return confirm("¿Estas seguro de EDITAR el viaje?");','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Editar los registros del viaje?'])!!}

                            {!!link_to_route('viajes.show', $title = ' Presupuesto', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-warning btn-xs btn-block glyphicon fa fa-print','target'=>'_blank','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Imprimir el presupuesto de viaje'])!!}

                            {!!link_to_route('calendario.edit', $title = ' Hoja de Ruta', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-primary btn-xs btn-block glyphicon fa fa-print','target'=>'_blank','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Imprimir la hoja de ruta'])!!}

                            {!!link_to_route('informes.show', $title = ' Informe', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-info btn-xs btn-block glyphicon fa fa-exclamation-circle','target'=>'_blank','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Realizar el informe del viaje'])!!}

                            {!! Form::open(['route'=>['viajes.destroy',$viaje->id],'method'=>'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-xs btn-block fa fa-ban" onClick="javascript: return confirm('¿Estas seguro de cancelar el viaje?');"  data-toggle="tooltip" data-placement="left" title="Cancelar el viaje">
                                    Cancelar
                                </button>
                            {!! Form::close() !!}

                        </td> 
                    </tr>
                    @endforeach
                </tbody>
 			</table>
 		</div>
   		</div>
    </div>
</div>
@endsection


@push('styles')
   {!! Html::style('/dashboard/plugins/datatables/dataTables.bootstrap.css') !!}
   <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
        .glyphicon {
             align: left;
        }
    table th{
        text-align: center;
    }
  </style>
@endpush

@push('scripts')
   {!! Html::script('/dashboard/plugins/datatables/jquery.dataTables.min.js') !!}
   {!! Html::script('/dashboard/plugins/datatables/dataTables.bootstrap.min.js') !!}
<script>
  $(function () {
    $('#vehiculo-table').DataTable( {
        "order": [[ 0, "desc" ]],
        "language": {

            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "NingÃºn dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Ãšltimo",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
  });



  </script>

@endpush