@extends('automotives.layout')

@section('content')

<div class="container">
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
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
						<th>Acciones</th>
					</tr>
 				</thead>
 				<tbody>
 					@foreach ($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->cedula }}</td>
						<td>{{ $user->celular }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->type }}</td>
						<td>{{ $user->entidad }}</td>
						<td>

							@canImpersonate($user->id)			
								<form action="{{ route('impersonations.store') }}" method="POST" accept-charset="utf-8">
									{{ csrf_field() }}
									<input type="hidden" name="user_id" value="{{ $user->id }}" >

									<button class="btn btn-info btn-xs"><i class="fa fa-user"></i> Personificar</button>

								</form>
							@endcanImpersonate
							
							{!!link_to_route('users.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary btn-xs fa fa-pencil-square-o'])!!}

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


