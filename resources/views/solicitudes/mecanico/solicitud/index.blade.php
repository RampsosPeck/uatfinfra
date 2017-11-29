@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-primary">
        <div class="box-header text-center">
            <h3 class="box-title"><b><FONT COLOR="#3c8dbc">LISTA DE SOLICITUDES DE TRABAJO</FONT></b></h3>
             <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear solicitud de trabajo para el mecánico</button>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  
  {!! Form::open(['route'=>'solicitudes.store','method'=>'POST','class'=>'form-horizontal']) !!}
              {{ csrf_field() }}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header box-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">INGRESA LOS SIGUIENTES DATOS</h4>
        </div>
        <div class="modal-body">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}} ">
             <!-- <label>Título de la publicación</label> -->
              <input name="title" 
                type="text"
                value="{{ old('title') }}" 
                placeholder="Ingresa aqui el título de la publicación" 
                class="form-control" required>
              {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="row">
                <div class="form-group {{ $errors->has('vehiculo') ? 'has-error' : '' }}">
                <label for="vehiculo" class="col-sm-4 control-label">Vehículo:</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <select name="vehiculo_id" 
                            class="form-control select2" 
                            id="vehiculo">
                            <option value="">Seleccione un Vehículo</option>
                                @foreach ($vehiculos as $vehiculo)
                                    <option value="{{ $vehiculo->id }}">{{ $vehiculo->tipo }} {{ $vehiculo->placa }} </option>
                                @endforeach
                        </select>
                        <span class="input-group-addon" id="basic-addon1">
                                <font color="red">
                                    <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                                </font>
                        </span>
                    </div>
                    {!! $errors->first('vehiculo', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            </div>
        </div>
        <div class="modal-footer ">
            <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
                <button class="btn btn-primary"><b>Crear solicitud</b></button>
            </center>
        </div>
      </div>
    </div>
  {{ FORM::close() }}
</div>
		</div>
        <div class="box-body">
        <div class="table-responsive">
   			<table id="vehiculo-table" class="table table-bordered table-striped ">
 				<thead>
 					<tr>
						<th>ID</th>
                        <th>Nro. Sol.M.</th>
                        <th>Conductor</th>
                        <th>Vehículo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Opciones</th>						
					</tr>
 				</thead>
 				<tbody bgcolor="#d9edf7" >
                    @foreach($solicitudes as $key => $solicitud)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                    	<td class="text-center">{{ $solicitud->id }}</td>
                        <td>{{ $solicitud->user->name }}</td>
                        <td>{{ $solicitud->vehiculo->tipo }} {{ $solicitud->vehiculo->placa }}</td>
                        <td>{{ $solicitud->descripcion }}</td>
                        <td>{{ $solicitud->fecha }}</td>
                        <td>
                            {!!link_to_route('informes.edit', $title = 'Editar', $parameters = $informe->id, $attributes = ['class'=>'btn btn-primary btn-xs fa fa-pencil-square-o'])!!}
                            
                            {!!link_to_route('informes.show', $title = ' Imprimir', $parameters = $informe->id, $attributes = ['class'=>'btn btn-warning btn-xs fa fa-print','target'=>'_blank'])!!} 
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
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">

@endpush

@push('scripts') 
    <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
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
        }
    });
  });
  


    $("#vehiculo").select2({
        placeholder: "Selecione un vehículo",
        language: "es",
        maximumSelectionLength: 2,
        allowClear: true
    });
  </script>
    
@endpush