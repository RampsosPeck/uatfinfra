@extends('automotives.layout')

@section('content')
@include('alertas.success')
<?php use Carbon\Carbon;
    use Uatfinfra\User; 
    use Uatfinfra\ModelAutomotores\Vehiculo; ?>
<div class="container">
    <div class="box box-primary">
        <div class="box-header text-center">
            <h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE INFORMES</FONT></b></h3>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
                        <th>Nro. Viaje</th>
                        <th>Conductor</th>
                        <th>Vehículo</th>
                        <th>Fecha/Viaje</th>
                        <th>Opciones</th>						
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($informes as $key => $informe)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                    	<td class="text-center">{{ $informe->viaje_id }}</td>
                        <?php $conducname = User::where('id',$informe->conductor)->first();?>
                        <td>{{ $conducname->name }}</td>
                        <?php $vehiculo = Vehiculo::where('id',$informe->conductor)->first();?>
                        <td>{{ $vehiculo->tipo }} {{ $vehiculo->placa }}</td>
                        <td>{{ Carbon::parse($informe->fecha_inicial)->format('Y-m-d')}} {{ $informe->horainicial }}</td>
                        <td>
                            {!!link_to_route('informes.edit', $title = 'Editar', $parameters = $informe->id, $attributes = ['class'=>'btn btn-primary btn-xs fa fa-pencil-square-o'])!!}
                            
                            {!!link_to_action('Automotive\InformeController@getImprimir', $title = ' Imprimir Informe', $parameters = $informe->id,  $attributes = ['class'=>'btn btn-warning btn-xs fa fa-print','target'=>'_blank'])!!}


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
        }
    });
  });
  


  </script>
    
@endpush