@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
    <div class="box">
        <div class="box-header">
            <center><h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE SOLICITUDES DE TRABAJO</FONT></b></h3></center>
             <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear SOLICITUD</button>


        @include('solicitudes.mecanico.solicitud.create')

		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th class="text-center">ID</th>
                        <th class="text-center">Nro. Sol.M.</th>
                        <th class="text-center">Responsable</th>
                        <th class="text-center">Vehículo</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Opciones</th>						
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($solicitudes as $key => $solicitud)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                    	<td class="text-center">{{ $solicitud->id }}</td>
                        <td>{{ $solicitud->user->name }}</td>
                        <td>{{ $solicitud->vehiculo->placa }}</td>
                        <td>{{ $solicitud->descripcion }}</td>
                        <td>{{ $solicitud->fecha }}</td>
                        <td>
                            {!!link_to_route('solicitudes.edit', $title = 'Editar', $parameters = $solicitud->id, $attributes = ['class'=>'btn btn-primary btn-xs fa fa-pencil-square-o'])!!}
                            
                            {!!link_to_route('solicitudes.show', $title = ' Imprimir', $parameters = $solicitud->id, $attributes = ['class'=>'btn btn-warning btn-xs fa fa-print','target'=>'_blank'])!!} 
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