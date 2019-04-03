@extends('automotives.layout')

@section('content')
@include('alertas.success')
<?php use Carbon\Carbon;
    use Uatfinfra\User; 
    use Uatfinfra\ModelAutomotores\Vehiculo; 
    use Uatfinfra\ModelAutomotores\Viaje;?>
<div class="container">
    <div class="box box-primary" style="background-color: #E5F2FF;">
        <div class="box-header text-center">
            <h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE INFORMES</FONT></b></h3>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
                        <th>Cod. Viaje</th>
                        <th>Conductor</th>
                        <th>Vehículo</th>
                        <th>Fecha/Viaje</th>
                        <th>Opciones</th>
                        <th>Estado</th>						
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($informes as $key => $informe)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <?php $codivi = Viaje::where('id',$informe->viaje_id)->first();?>
                    	<td class="text-center">{{ $codivi->codigo }}</td>
                        <?php $conducname = User::where('id',$informe->conductor)->first();?>
                        <td>{{ $conducname->name }}</td>
                        <?php $vehiculo = Vehiculo::where('id',$informe->conductor)->first();?>
                        <td>{{ $vehiculo->tipo }} {{ $vehiculo->placa }}</td>
                        <td>{{ Carbon::parse($informe->fecha_inicial)->format('Y-m-d')}} {{ $informe->horainicial }}</td>
                        <td>
                        @can('update', $informe)
                        @if($informe->estado != "APROBADO")
                            {!!link_to_route('informes.edit', $title = 'Editar', $parameters = $informe->id, $attributes = ['class'=>'btn btn-primary btn-xs fa fa-pencil-square-o'])!!}
                        @endif
                        @endcan
                            {!!link_to_action('Automotive\InformeController@getImprimir', $title = ' Imprimir Informe', $parameters = $informe->id,  $attributes = ['class'=>'btn btn-warning btn-xs fa fa-print','target'=>'_blank'])!!}

                        </td>
                        <td>
                            @if(!empty($informe->estado))
                                @if($informe->estado === "APROBADO")
                                    <font color="green"><b>{{ $informe->estado }}</b></font>

                                    {!!link_to_action('Automotive\InformeController@getObservar', $title = '', $parameters = $informe->id, $attributes = ['class'=>'btn btn-warning btn-xs fa fa-exclamation-circle','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Observar Informe. (Deberá explicar la razón.)'])!!}
                                @else
                                    <font color="#f0ad4e"><b>{{ $informe->estado }}</b></font>

                                    {!!link_to_action('Automotive\InformeController@getAprobar', $title = '', $parameters = $informe->id, $attributes = ['class'=>'btn btn-success btn-xs fa fa-check-square','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Aprobar el informe. (Se actualizará el km. del vehiculo)'])!!}
                                @endif
                            @else    
                                {!!link_to_action('Automotive\InformeController@getAprobar', $title = '', $parameters = $informe->id, $attributes = ['class'=>'btn btn-success btn-xs fa fa-check-square','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Aprobar el informe. (Se actualizará el km. del vehiculo)'])!!}
                                {!!link_to_action('Automotive\InformeController@getObservar', $title = '', $parameters = $informe->id, $attributes = ['class'=>'btn btn-warning btn-xs fa fa-exclamation-circle','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Observar Informe. (Deberá explicar la razón.)'])!!}
                            @endif
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
        },
        "order": [[ 0, "desc" ]]
    });
  });
  


  </script>
    
@endpush