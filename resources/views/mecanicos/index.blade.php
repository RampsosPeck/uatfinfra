@extends('automotives.layout')
<?php 
use Uatfinfra\ModelMecanico\Mecanico;?>
@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-info">
        <div class="box-header">
            <center><h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE SOLICITUDES DE TRABAJO PARA EL  MECÁNICO</FONT></b></h3></center>

        <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modalSolMe"><i class="fa fa-eye"></i> Trabajos realizados</button>
        <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#modalSolMe"><i class="fa fa-eye"></i> Pedido de Materiales</button>
        </div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th class="text-center">Nro.</th>
                        <th class="text-center">Cod. Sol.</th>
                        <th class="text-center">Solicitante</th>
                        <th class="text-center">Vehículo</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Opciones</th>
                        <th class="text-center">Nro. Trabajos</th>
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($solicitudes as $key => $solicitud)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                    	<td class="text-center">{{ $solicitud->solmecodi }}</td>
                        <td>{{ $solicitud->user->name }}</td>
                        <td>{{ $solicitud->vehiculo->placa }}</td>
                        <td>{{ $solicitud->fecha }}</td>
                        <td>

                            {!!link_to_route('mecanicos.show', $title = ' Concretar', $parameters = $solicitud->id, $attributes = ['class'=>'btn btn-info btn-xs  fa fa-pencil-square-o'])!!}

                            {!!link_to_route('mecanicos.show', $title = ' Pedido M.', $parameters = $solicitud->id, $attributes = ['class'=>'btn btn-warning btn-xs  fa fa-print','target'=>'_blank'])!!}
                        </td>
                        <?php $work = Mecanico::where('sol_id',$solicitud->id)->count();?>
                        @if($work == 0)
                            <td class="text-center" bgcolor="#f2dede">{{ "0" }}</td>
                        @else
                            <td class="text-center">{{ $work }}</td>
                        @endif
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
        },
        "order": [[ 0, "desc" ]]
    });
  });
  </script>

@endpush