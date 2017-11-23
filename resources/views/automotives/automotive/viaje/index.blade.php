@extends('automotives.layout')

@section('content')
@include('alertas.success')
<?php use Carbon\Carbon; ?>
<div class="container">
    <div class="box">
        <div class="box-header text-center">
            <h3 class="box-title"><b>Lista de viajes</b></h3>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
                        <th>Categoria</th>
                        <th>Conductor</th>
						<th>Tipo</th>
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
                    @foreach($viajes as $viaje)
                    <tr>
                    	<td class="text-center">{{ $viaje->id }}</td>
                        <td>{{ $viaje->categoria }}</td>
                        <td>
                            @foreach ($viaje->conductores as $conductor)
                                {{ $conductor->name }}.
                            @endforeach
                        </td>
                        <td>{{ $viaje->tipo }}</td>
                        <td>{{ $viaje->encargado->name }}</td>
                        <td>{{ $viaje->entidad }}</td>
                        <td>{{ $viaje->dias }} <b>Pasajeros:</b>{{ $viaje->pasajeros }}</td>
                        <td>{{ Carbon::parse($viaje->fecha_inicial)->format('Y-m-d')}} {{ $viaje->horainicial }}</td>
                        <td>{{ Carbon::parse($viaje->fecha_final)->format('Y-m-d')}} {{ $viaje->horafinal }}</td>
                        <td>{{ $viaje->vehiculo->placa }}</td>
                        <td>
                            {!!link_to_route('viajes.edit', $title = 'Editar', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-primary btn-xs btn-block fa fa-pencil-square-o'])!!}
                            
                            {!!link_to_route('viajes.show', $title = ' Imprimir', $parameters = $viaje->id, $attributes = ['class'=>'btn btn-warning btn-xs  glyphicon fa fa-print','target'=>'_blank'])!!} 

                            {!! Form::open(['route'=>['viajes.destroy',$viaje->id],'method'=>'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-xs btn-block fa fa-ban" onClick="javascript: return confirm('¿Estas seguro de cancelar el viaje?');">
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