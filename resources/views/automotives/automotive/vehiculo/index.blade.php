@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-info">
        <div class="box-header text-center">
            <h3 class="box-title"><b>LISTA DE VEHÍCULOS</b></h3>
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
                        <th>KM</th>
                        <th>Pax</th>                      
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
                        <td>{{ $vehiculo->kilometraje }}</td>
                        <td>{{ $vehiculo->pasajeros }}</td>
                        <td>{{ $vehiculo->estado }}</td>
                        <td>
                            {!!link_to_route('vehiculos.edit', $title = 'Editar', $parameters = $vehiculo->id, $attributes = ['class'=>'btn btn-primary btn-xs   fa fa-pencil-square-o'])!!}
                            <a href="#modalDetalle{{$vehiculo->id}}" class="btn btn-info btn-xs fa fa-eye-slash" data-toggle="modal"> Detalle</a>
                        </td>
                    </tr>
                    @include('automotives.automotive.vehiculo.detalle')
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