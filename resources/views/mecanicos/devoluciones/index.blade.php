@extends('automotives.layout')
<?php 
use Uatfinfra\ModelSolicitudes\Solicitud; $si = 0;
use Uatfinfra\ModelServicios\General; ?>
@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-info" style="background-color: #E5F2FF;">
        <div class="box-header">
            <center><h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE MATERIAL DEVUELTO</FONT></b></h3></center>

        <a href="{{ route('devoluciones.show',$si) }}" class="btn btn-warning pull-right" , data-toggle="tooltip", data-placement="top", title="Vea las solicitudes de trabajo."><i class="fa fa-eye"></i>Registrar devolución</a>
        </div>
        
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>Nro.</th>
                        <th>Sección</th>
                        <th>Cod. Sol.</th>
                        <th>Serial</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Nombre</th>
                        <th>Detalle</th>
                        <th>Opciones</th>
                        <th>Estado</th>                        
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($devoluciones as $key => $devolucion)
                    @include('mecanicos.devoluciones.aprobar')
                    @include('mecanicos.devoluciones.observar')
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <td class="text-center">{{ $devolucion->seccion }}</td>              
                       
                            @if($devolucion->seccion == "Mecánico de Buses")
                            <?php $soli = Solicitud::where('id',$devolucion->sol_id)->first(); ?>
                    	    <td class="text-center">{{ $soli->solmecodi }}</td>
                            @elseif($devolucion->seccion == "Administrador")
                                <td class="text-center">{{ "ninguno" }}</td>
                            @else
                            <?php $solservi = General::where('id',$devolucion->sol_id)->first(); ?>
                            <td class="text-center">{{ $solservi->coding }}</td>
                            @endif
            
                        <td>{{ $devolucion->serial }}</td>
                        <td>{{ $devolucion->fecha }}</td>
                        <td>{{ $devolucion->cantidad }}</td>
                        <td>{{ $devolucion->nombre }}</td>
                        <td>{{ $devolucion->detalle }}</td>
                        <td class="text-center">

                            {!!link_to_route('devoluciones.edit', $title = ' Editar', $parameters = $devolucion->id, $attributes = ['class'=>'btn btn-primary  btn-xs btn-block  fa fa-pencil-square-o', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edite su devolución de material.'])!!}
                            <br>
                            @if($devolucion->estado != 'APROBADO')
                            {!! Form::open(['route'=>['devoluciones.destroy',$devolucion->id],'method'=>'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-xs btn-block" , data-toggle="tooltip", data-placement="top", title="Desea eliminar esta debolución?">
                                    <span class="fa fa-trash"> Eliminar  </span> 
                                </button>
                            {!! Form::close() !!}
                            @endif

                        </td>
                        @if ($devolucion->estado == 'ENVIADO')
                            <td class="text-center" STYLE="background:#fcf8e3" data-toggle="tooltip" data-placement="left" title="La devolución está siendo tomada en cuenta por el Administrador para su APROBACIÓN o OBSERVACIÓN">  
                             ENVIADO
                                 <br>
                                <button class="btn btn-success btn-xs fa " data-toggle="modal" data-target="#modalAprobar{{ $devolucion->id }}">Aprobar</button>

                                <button class="btn btn-warning btn-xs fa " data-toggle="modal" data-target="#modalObservar{{ $devolucion->id }}">Observar</button>
                            </td>
                        @else 
                            @if ($devolucion->estado == 'APROBADO')
                                <td class="text-center" STYLE="background:#dff0d8"  data-toggle="tooltip" data-placement="right" title="{{ $devolucion->comentario }}">  
                                 APROBADO
                                     <br>
                                    <button class="btn btn-success btn-xs fa " data-toggle="modal" data-target="#modalAprobar{{ $devolucion->id }}">Aprobar</button>

                                    <button class="btn btn-warning btn-xs fa " data-toggle="modal" data-target="#modalObservar{{ $devolucion->id }}">Observar</button>
                                </td>
                            @else
                                <td class="text-center" STYLE="background:#f2dede" data-toggle="tooltip" data-placement="right" title="{{ $devolucion->comentario }}">  
                                 OBSERVADO
                                     <br>
                                    <button class="btn btn-success btn-xs fa " data-toggle="modal" data-target="#modalAprobar{{ $devolucion->id }}">Aprobar</button>

                                    <button class="btn btn-warning btn-xs fa " data-toggle="modal" data-target="#modalObservar{{ $devolucion->id }}">Observar</button>
                                </td>
                            @endif
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