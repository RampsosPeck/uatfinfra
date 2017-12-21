@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-info" >
    	<font color="#17a2b8"><span class="fa fa-users fa-2x form-control-feedback"></span></font>
        <div class="box-header">
        	<center>
        		<h3 class="box-title"><font color="#17a2b8" ><b>LISTA DE USUARIOS</b></font></h3>
        	</center>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="users-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Cédula</th>
						<th>Celular</th>
						<th>Email</th>
						<th>Tipo</th>
						<th>Entidad</th>
						<th>Activo</th>
						<th>Acciones</th>
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7">
 					@foreach ($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->cedula }}</td>
						<td>{{ $user->celular }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->type }}</td>
						<td>{{ $user->entidad }}</td>
						@if($user->active === true)
							<td class="text-center"><font color="green"><b>{{ "SI" }}</b></font></td>
						@else
							<td class="text-center"><font color="red"><b>{{ "NO" }}</b></font></td>
						@endif
						<td>

							@canImpersonate($user->id)			
								<form action="{{ route('impersonations.store') }}" method="POST" accept-charset="utf-8">
									{{ csrf_field() }}
									<input type="hidden" name="user_id" value="{{ $user->id }}" >

									<button class="btn btn-success btn-xs btn-block"><i class="fa fa-user"></i> Personificar</button>

								</form>
							@endcanImpersonate
							
							{!!link_to_route('users.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary btn-xs btn-block fa fa-pencil-square-o'])!!}

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
    $('#users-table').DataTable( {
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
