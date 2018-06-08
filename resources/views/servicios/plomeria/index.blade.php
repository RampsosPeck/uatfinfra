@extends('automotives.layout')
    
@section('content')
@include('alertas.success')
<div class="container ">
    <div class="box box-info ">
        <div class="box-header">
            <center><h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE SOLICITUDES DE TRABAJO DE PLOMERÍA</FONT></b></h3></center>
            
            @include('servicios.plomeria.create')
            
             <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalPlome"><i class="fa fa-plus"></i> Crear SOLICITUD</button>
             
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="carpinteria-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>Nro.</th>
                        <th>Cod. Sol.</th>
                        <th>Sección</th>
                        <th>Solicitante</th> 
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>ESTADO</th>
                        <th>Opciones</th>						
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($generales as $key => $general)
                    @include('servicios.edit')
                    @include('servicios.create')
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                    	<td class="text-center">{{ $general->coding }}</td>
                        <td class="text-center">{{ $general->seccion }}</td>
                        <td>{{ $general->servicio->solicitantes }}</td> 
                        <td>{{ $general->descripcion }}</td>
                        <td class="text-center">{{ $general->fecha }}</td>
                        @if($general->estado == 'ENVIADO')
                            <td  ALIGN=center data-toggle="tooltip" data-placement="left" title="La solicitud de trabajo esta siendo tomada en cuenta por el encargado de Servicios Generales para su APROBACIÓN o OBSERVACIÓN" > <font color="#f39c12">ENVIADO</font> </td>
                        @endif
                        @if($general->estado == 'APROBADO')
                            <td  ALIGN=center data-toggle="tooltip" data-placement="left" title="NOTA: {{ $general->comentario }}" > <font color="#00a65a">APROBADO</font> </td>
                        @endif
                        @if($general->estado == 'OBSERVADO')
                            <td  ALIGN=center data-toggle="tooltip" data-placement="left" title="{{ $general->comentario }}" > <font color="#dd4b39">OBSERVADO</font> </td>
                        @endif 
                        <td>
                             {!!link_to_route('generales.edit', $title = 'Editar', $parameters = $general->id, $attributes = ['class'=>'btn btn-primary btn-xs fa fa-pencil-square-o'])!!}
                            
                            {!!link_to_route('generales.show', $title = ' Imprimir', $parameters = $general->id, $attributes = ['class'=>'btn btn-info btn-xs fa fa-print','target'=>'_blank'])!!} 
                            <br>
                            <button class="btn btn-success btn-xs fa " data-toggle="modal" data-target="#modalEstado{{ $general->id }}">Aprobar</button>

                            <button class="btn btn-warning btn-xs fa " data-toggle="modal" data-target="#modalObservar{{ $general->id }}">Observar</button>
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
    $('#carpinteria-table').DataTable( {
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