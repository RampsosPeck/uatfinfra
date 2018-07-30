@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-primary" style="background-color: #E5F2FF;">
        <div class="box-header text-center">
            <h3 class="box-title"><b>LISTA DE DESTINOS</b></h3>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
						<th>Depto. de partida</th>
                        <th>Lugar de partida</th>
						<th>Depto. de llegada</th>
                        <th>Lugar de llegada</th>
                        <th>Ruta</th>
                        <th>Kilometraje</th>
                        <th>Tiempo</th>
                        <th>Antecedentes</th>
                        <th>Opciones</th>	                        					
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7">
                    @foreach($destinos as $destino)
                    <tr>
                    	<td>{{ $destino->id }}</td>
                        <td>{{ $destino->dep_inicio }}</td>
                        <td>{{ $destino->origen }}</td>
                        <td>{{ $destino->dep_final }}</td>
                        <td>{{ $destino->destino }}</td>
                        <td>{{ $destino->ruta }}</td>
                        <td>{{ $destino->kilometraje }}</td>
                        <td>{{ $destino->tiempo }}</td>
                        <td>{{ $destino->antes }}</td>
                        <td>
                            {!!link_to_route('destinos.edit', $title = 'Editar', $parameters = $destino->id, $attributes = ['class'=>'btn btn-primary btn-xs btn-block fa fa-pencil-square-o'])!!}
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