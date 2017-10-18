@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de vehículos</h3>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
                        <th>Asignado A:</th>
                        <th>Placa</th>
                        <th>Combustible</th>
                        <th>Tipo</th>
                        <th>Especificación</th>
                        <th>KM</th>
                        <th>Pax</th>                      
                        <th>Color</th>                      
                        <th>Modelo</th>                      
                        <th>Marca</th>                      
                        <th>Chasis</th>                     
                        <th>Motor</th>                     
                        <th>Cilindrada</th>                     
						<th>Estado</th>
                        <th>Opciones</th>						
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7">
                    @foreach($vehiculos as $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->id }}</td>
                        @if($vehiculo->user_id == 0)
                            <td>{{ "Designado" }}</td>
                        @else
                            <td>{{ $vehiculo->user->name }}</td>
                        @endif
                        <td>{{ $vehiculo->placa }}</td>
                        <td>
                        @foreach ($vehiculo->combustibles as $combusti)
                            {{ $combusti->name }} 
                        @endforeach
                        </td>
                        <td>{{ $vehiculo->tipo }}</td>
                        <td>{{ $vehiculo->especificacion }}</td>
                        <td>{{ $vehiculo->kilometraje }}</td>
                        <td>{{ $vehiculo->pasajeros }}</td>
                        <td>{{ $vehiculo->color }}</td>
                        <td>{{ $vehiculo->modelo }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td>{{ $vehiculo->chasis }}</td>
                        <td>{{ $vehiculo->motor }}</td>
                        <td>{{ $vehiculo->cilindrada }}</td>
                        <td>{{ $vehiculo->estado }}</td>
                        <td>
                            {!!link_to_route('vehiculos.edit', $title = 'Editar', $parameters = $vehiculo->id, $attributes = ['class'=>'btn btn-primary btn-xs btn-block fa fa-pencil-square-o'])!!}
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
   {!! Html::style('/adminlte/plugins/datatables/dataTables.bootstrap.css') !!}
@endpush

@push('scripts') 
   {!! Html::script('/adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
   {!! Html::script('/adminlte/plugins/datatables/dataTables.bootstrap.min.js') !!}
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