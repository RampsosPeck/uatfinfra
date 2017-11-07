@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de viajes</h3>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
                        <th>Conductor</th>
						<th>Tipo</th>
                        <th>Encargado</th>
						<th>Entidad</th>
                        <th>Dias</th>
                        <th>Pasajeros</th>
                        <th>Desde</th>
                        <th>Hora</th>
                        <th>Hasta</th>
                        <th>Hora</th>
                        <th>Categoria</th>
                        <th>Nota</th>
                        <th>Vehiculo</th>
                        <th>Opciones</th>						
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7">
                    @foreach($viajes as $viaje)
                    <tr>
                    	<td>{{ $viaje->id }}</td>
                        <td>
                            @foreach ($viaje->conductores as $conductor)
                                {{ $conductor->name }}.
                            @endforeach
                        </td>
                        <td>{{ $viaje->tipo }}</td>
                        <td>{{ $viaje->encargado->name }}</td>
                        <td>{{ $viaje->entidad }}</td>
                        <td>{{ $viaje->dias }}</td>
                        <td>{{ $viaje->pasajeros }}</td>
                        <td>{{ $viaje->fecha_inicial }}</td>
                        <td>{{ $viaje->horainicial }}</td>
                        <td>{{ $viaje->fecha_final }}</td>
                        <td>{{ $viaje->horafinal }}</td>
                        <td>{{ $viaje->categoria }}</td>
                        <td>{{ $viaje->nota }}</td>
                        <td>{{ $viaje->vehiculo->placa }}</td>
                        <td>
                            {!!link_to_route('viajes.edit', $title = 'Editar', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-primary btn-xs btn-block fa fa-pencil-square-o'])!!}
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