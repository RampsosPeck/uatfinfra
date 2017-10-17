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
        		<h3 class="box-title"><font color="#17a2b8" ><b>LISTA DE VEHÍCULOS</b></font></h3>
        	</center>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="users-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>#</th>
						<th>Encargado</th>
						<th>Entidad</th>
						<th>Objetivo</th>
						<th>Fecha Inicial</th>
						<th>Fecha Final</th>
						<th>Pasajeros</th>
						<th>Acciones</th>
					</tr>
 				</thead>
 				<tbody>
 					@foreach ($reservations as $reservation)
					<tr>
						<td>{{ $reservation->id }}</td>
						<td>{{ $reservation->user->name }}</td>
						<td>{{ $reservation->entity }}</td>
						<td>{{ $reservation->objective }}</td>
						<td>{{ $reservation->startdate }}</td>
						<td>{{ $reservation->enddate }}</td>
						<td><center>{{ $reservation->passengers }}</center></td>
						<td>

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


