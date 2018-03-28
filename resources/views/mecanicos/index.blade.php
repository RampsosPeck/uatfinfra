@extends('automotives.layout')
<?php 
use Uatfinfra\ModelMecanico\Mecanico;
use Uatfinfra\ModelMecanico\Pedido;?>
@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-info">
        <div class="box-header">
            <center><h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE SOLICITUDES DE TRABAJO PARA EL  MECÁNICO</FONT></b></h3></center>

        <a href="{{ route('pedidos.index') }}" class="btn btn-warning pull-right"><i class="fa fa-eye"></i> Pedido de Materiales</a>
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
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Opciones</th>
                        <th class="text-center">Nro. Trabajos</th>
                        <th class="text-center">Pedido M.</th>                        
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($solicitudes as $key => $solicitud)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                    	<td class="text-center">{{ $solicitud->solmecodi }}</td>
                        <td>{{ $solicitud->user->name }}</td>
                        <td>{{ $solicitud->vehiculo->placa }}</td>
                        <td>{{ $solicitud->descripcion }}</td>
                        <td>{{ $solicitud->fecha }}</td>
                        <td>

                            {!!link_to_route('mecanicos.show', $title = ' Concretar', $parameters = $solicitud->id, $attributes = ['class'=>'btn btn-info btn-block btn-xs  fa fa-pencil-square-o','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Registre el trabajo que realizó en esta solicitud.'])!!}

                            {!!link_to_route('pedidos.show', $title = ' Pedido M.', $parameters = $solicitud->id, $attributes = ['class'=>'btn btn-warning btn-block btn-xs  fa fa-print', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Solicite material para realizar el trabajo de esta solicitud.'])!!}
                        </td>
                        <?php $work = Mecanico::where('sol_id',$solicitud->id)->count();?>
                        @if($work == 0)
                            <td class="text-center" bgcolor="#f2dede">{{ "0" }}</td>
                        @else
                            <td class="text-center">{{ $work }}
                                {!!link_to_route('mecanicos.show', $title = ' Ver', $parameters = $solicitud->id, $attributes = ['class'=>'btn btn-primary btn-xs  fa fa-eye','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Vea todos los trabajos realizados para esta solicitud.'])!!}</td>
                        @endif
                        <?php $pedido = Pedido::where('sol_id',$solicitud->id)->first();?>
                        @if(empty($pedido))
                            <td class="text-center" >{{ "NO" }}</td>
                        @else
                            <td class="text-center" bgcolor="#f2dede">{{ "SI" }}
                            {!!link_to_action('Mecanico\PedidoController@getImprimir', $title = ' Ver', $parameters = $pedido->id,  $attributes = ['class'=>'btn btn-info btn-xs btn-block fa fa-print','target'=>'_blank', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Vea el pedido de material para esta solicitud.'])!!}</td>
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