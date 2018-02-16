@extends('automotives.layout')

@section('content')
@include('alertas.success')
<?php use Carbon\Carbon;?>
<div class="container">
    <div class="box box-info">
        <div class="box-header text-center">
            <center>
        		<h3 class="box-title"><font color="#17a2b8" ><b>LISTA DE RESERVACIONES</b></font></h3>
        	</center>
        	<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalreserva"><i class="fa fa-plus"></i> Crear RESERVA</button>
            
            @include('automotives.automotive.reservation.create')

		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>#</th>
						<th>Encargado</th>
						<th>Entidad</th>
						<th>Objetivo</th>
						<th>Fecha Inicial</th>
						<th>Fecha Final</th>
						<th>Pasajeros</th>
						<th>Acciones</th>			
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7">
                    @foreach ($reservations as $reservation)
					<tr>
						<td>{{ $reservation->id }}</td>
						<td>{{ $reservation->user->name }}</td>
						<td>{{ $reservation->entity }}</td>
						<td>{{ $reservation->objetive }}</td>
						<td>{{ Carbon::parse($reservation->startdate)->format('Y-m-d')}}</td>
						<td>{{ Carbon::parse($reservation->enddate)->format('Y-m-d')}}</td>
						<td><center>{{ $reservation->passengers }}</center></td>
						<td>
							{!!link_to_route('reservas.edit', $title = ' Editar', $parameters = $reservation->id, $attributes = ['class'=>'btn btn-primary btn-block btn-xs fa fa-pencil-square-o'])!!}

							{!!link_to_route('reservas.show', $title = ' Concretar', $parameters = $reservation->id, $attributes = ['class'=>'btn btn-info btn-block btn-xs fa fa-pencil-square'])!!}
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
        },
        "order": [[ 0, "desc" ]]
    });
  });
  
  </script>
@endpush
