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
              			<font color="#007bff"><b>REALIZAR LA DEVOLUCIÓN DE MATERIAL</b></font>
          			</h3>
          		</center>
            </div>
            <div class="box-body" STYLE="background:#bce8f1">
	
			<form class="form-horizontal" role="form" method="POST" action="{{ route('devoluciones.store') }}">

			    {{ csrf_field() }}
				
				@if ($si == "1" AND !empty($solicitud) )
					<input type="hidden" name="sol_id" id="sol_id" value="{{ $solicitud->id }}">			
				@else
					<input type="hidden" name="sol_id" id="sol_id" value="{{ "0" }}">
			    @endif

			    <div class="form-group{{ $errors->has('serial') ? ' has-error' : '' }}">
			        <label for="serial" class="col-md-4 control-label">Serial:</label>
			        <div class="col-md-6">
			            <input id="serial" type="text" class="form-control" name="serial" value="{{ old('serial') }}" placeholder="Ejm. 25863-ASRHD" >
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
			            <input id="fecha" type="date" class="form-control" name="fecha" placeholder="dd/mm/aaaa">
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
			            <input id="cantidad" type="number" class="form-control" name="cantidad" value="{{ old('cantidad') }}" placeholder="Ejm. 3">
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
			            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Ejm. Piezas">

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
			            <textarea id="detalle" type="text" class="form-control" name="detalle" value="{{ old('detalle') }}" placeholder="Ejm. Se entregó del cambio de llantas tres piezas del mismo."></textarea>
			            @if ($errors->has('detalle'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('detalle') }}</strong>
			                </span>
			            @endif
			        </div>
			    </div>
			    <div class="modal-footer ">
			        <center>
			            <button class="btn btn-primary"><i class="fa fa-save"></i><b> Guardar</b></button>
			        </center>
			    </div>
			</form>
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
    table th{
        text-align: center;
    }
  </style>
@endpush
