@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-info" style="background-color: #E5F2FF;">
    	<font color="#17a2b8"><span class="fa fa-users fa-2x form-control-feedback"></span></font>
        <div class="box-header">
        	<center>
        		<h3 class="box-title"><font color="#17a2b8" ><b>LISTA DE PERMISOS</b></font></h3>
        	</center>  
		    </div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="roles-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
						<th>Identificador</th>
            <th>Nombre</th>  
						<th>Acciones</th> 
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7">
 					@foreach ($permissions as $permission)
					<tr>
						<td>{{ $permission->id }}</td>
						<td>{{ $permission->name }}</td>
            <td>{{ $permission->display_name }}</td>  
            <td>
              @can('update', $permission)
    						<center>  
                  <a href="{{ route('permissions.edit',$permission) }}"
                      class="btn btn-xs btn-info">
                        <i class="fa fa-pencil-square-o"></i> Editar Permiso</a> 
                </center> 
              @endcan
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
    $('#roles-table').DataTable( {
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
