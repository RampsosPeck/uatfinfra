@extends('automotives.layout')

@section('content')

<div class="container">
<div class="col-md-2"></div>
<div class="col-md-6">
    <!-- Horizontal Form -->
        <div class="box box-primary">
        	<font color="#007bff"><span class="fa fa-bus fa-2x form-control-feedback"></span></font>
            <div class="box-header with-border">
              	<center>
              		<h3 class="box-title">
              			<font color="#007bff"><b>EDITAR LA DEVOLUCIÓN DE MATERIAL </b></font>
          			</h3>
          		</center>
            </div>
            <div class="box-body" STYLE="background:#bce8f1">
	
			{!! Form::model($devolucion,['route'=>['devoluciones.update',$devolucion->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
              {{ csrf_field() }}
				
				<input type="hidden" name="sol_id" id="sol_id" value="{{ $devolucion->sol_id }}">
			    
			    <div class="form-group{{ $errors->has('serial') ? ' has-error' : '' }}">
			        <label for="serial" class="col-md-4 control-label">Serial:</label>
			        <div class="col-md-6">
			            <input id="serial" type="text" class="form-control" name="serial" value="{{ old('serial',$devolucion->serial) }}" placeholder="Ejm. 25863-ASRHD" >
			            @if ($errors->has('serial'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('serial') }}</strong>
			                </span>
			            @endif
			        </div>
			    </div>

			    <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
			        <label for="fecha" class="col-md-4 control-label">Fecha:</label>
			        <div class="col-md-6">
			            <input id="fecha" type="date" class="form-control" name="fecha" placeholder="dd/mm/aaaa" value="{{ old('fecha',$devolucion->fecha) }}">
			            @if ($errors->has('fecha'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('fecha') }}</strong>
			                </span>
			            @endif
			        </div>
			    </div>

			    <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
			        <label for="cantidad" class="col-md-4 control-label">Cantidad:</label>
			        <div class="col-md-6">
			            <input id="cantidad" type="number" class="form-control" name="cantidad" value="{{ old('cantidad',$devolucion->cantidad) }}" placeholder="Ejm. 3">
			            @if ($errors->has('cantidad'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('cantidad') }}</strong>
			                </span>
			            @endif
			        </div>
			    </div>

			    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			        <label for="nombre" class="col-md-4 control-label">Nombre:</label>
			        <div class="col-md-6">
			            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre',$devolucion->nombre) }}" placeholder="Ejm. Piezas">

			            @if ($errors->has('nombre'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('nombre') }}</strong>
			                </span>
			            @endif
			        </div>
			    </div>

			    <div class="form-group{{ $errors->has('detalle') ? ' has-error' : '' }}">
			        <label for="detalle" class="col-md-4 control-label">Detalle:</label>
			        <div class="col-md-6">
			            <textarea id="detalle" type="text" class="form-control" name="detalle" value="{{ old('detalle') }}" placeholder="Ejm. Se entregó del cambio de llantas tres piezas del mismo.">{{ $devolucion->detalle }}</textarea>
			            @if ($errors->has('detalle'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('detalle') }}</strong>
			                </span>
			            @endif
			        </div>
			    </div>
			    <div class="modal-footer ">
			        <center>
			            <button class="btn btn-primary"><b>Guardar</b></button>
			        </center>
			    </div>
			{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

@endsection


@push('styles')
	<style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
  </style>
@endpush