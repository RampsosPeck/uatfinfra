@extends('automotives.layout')

@section('content')

<div class="container">
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de usuarios del sistema {{ "Estas en vehiculo index" }}</h3>
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
 					
 				</tbody>
 			</table>
 		</div>	     			
   		</div>
    </div>
</div>
@endsection


