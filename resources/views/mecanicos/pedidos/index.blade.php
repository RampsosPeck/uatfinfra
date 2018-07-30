@extends('automotives.layout')
<?php 
use Uatfinfra\ModelSolicitudes\Solicitud; ?>
@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-info" style="background-color: #E5F2FF;">
        <div class="box-header">
            <center><h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE PEDIDO DE MATERIAL DE LAS SOLICITUDES DE TRABAJO</FONT></b></h3></center>

        <a href="{{ route('mecanicos.index') }}" class="btn btn-warning pull-right" , data-toggle="tooltip", data-placement="top", title="Vea las solicitudes de trabajo."><i class="fa fa-eye"></i> Solicitudes de Trabajo</a>
        </div>
        
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>Nro.</th>
                        <th>Cod. Sol.</th>
                        <th>Solicitante</th>
                        <th>Vehículo</th>
                        <th>Justificación</th>
                        <th>Observación</th>
                        <th>Fecha</th>
                        <th>Opciones</th>                        
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($pedidos as $key => $pedido)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <?php $soli = Solicitud::where('id',$pedido->sol_id)->first(); ?>
                    	<td class="text-center">{{ $soli->solmecodi }}</td>
                        <td>{{ $soli->user->name }}</td>
                        <td>{{ $soli->vehiculo->placa }}</td>
                        <td>{{ $pedido->justificacion }}</td>
                        <td>{{ $pedido->observacion }}</td>
                        <td>{{ $pedido->created_at->format('Y-m-d') }}</td>
                        <td class="text-center">

                            {!!link_to_route('pedidos.edit', $title = ' Editar', $parameters = $pedido->id, $attributes = ['class'=>'btn btn-primary  btn-xs btn-block  fa fa-pencil-square-o', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edite su pedido de material.'])!!}
                            <br>
                            {!!link_to_action('Mecanico\PedidoController@getImprimir', $title = ' Imprimir Pedido', $parameters = $pedido->id,  $attributes = ['class'=>'btn btn-info btn-xs btn-block fa fa-print','target'=>'_blank', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Puede imprimir su pedido de material.'])!!}
                            <br>
                            {!!link_to_route('solicitudes.show', $title = ' Ver Solicitud', $parameters = $pedido->sol_id, $attributes = ['class'=>'btn btn-warning btn-xs btn-block fa fa-print','target'=>'_blank', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Vea la solicitud realizada para este pedido.'])!!} 
                            <br>
                            {!! Form::open(['route'=>['pedidos.destroy',$pedido->id],'method'=>'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-xs btn-block" , data-toggle="tooltip", data-placement="top", title="Desea eliminar este pedido?">
                                    <span class="fa fa-trash"> Eliminar  </span> 
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
        "order": [[ 0, "asc" ]]
    });
  });
  </script>

@endpush