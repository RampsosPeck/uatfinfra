@extends('automotives.layout')
<?php use Carbon\Carbon;?>
@section('content')
<div class="container">
<br><br><br><br>
<div class="col-md-3">
</div>
<div class="col-md-6">
    <div class="box box-info">
        <div class="box-header with-border">
          <CENTER><h3 class="box-title"><b>EDITAR SOLICITUD</b></h3></CENTER>
        </div>
        <div class="box-body" STYLE="background:#bce8f1" >
    	{!! Form::model($solicitud,['route'=>['solicitudes.update',$solicitud->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
              {{ csrf_field() }}
		
            <div class="{{ $errors->has('vehiculo_id') ? 'has-error' : '' }} text-center">
                 <label>Vehículo:</label>
                  <select name="vehiculo_id" 
                      class="form-control select2" 
                      id="vehiculo_id">
                    <option value="">Seleccione un Vehículo</option>
                      @foreach ($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->id }}"
                          {{ old('vehiculo_id', $solicitud->vehiculo_id) == $vehiculo->id ? 'selected' : '' }}
                          >{{ $vehiculo->placa }} </option>
                          
                      @endforeach
                  </select>
                   {!! $errors->first('vehiculo_id', '<span class="help-block">:message</span>') !!}
            </div>

			<div class="text-center">
	            <label for="message-text" class="control-label">Descripcion del trabajo a realizar:</label>
	            {!! Form::textarea('descripcion',old('descripcion',$solicitud->descripcion),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Ingrese el trabajo que realizara el mecánico','required']) !!}
	            {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
	        </div>
			<br>

    @if($solicitud->estado === "ENVIADO")  
		    <center>
		      <button type="submit" class="btn btn-sm btn-primary">
		        <b>Guardar la solicitud</b> <i class="fa fa-check-square-o" aria-hidden="true"></i>
		      </button>
		    </center>

		{!! Form::close() !!}<BR>
		<center>
    @else
          <div class="text-center" style="background:#f2dede" >{{ $solicitud->comentario }}</div>
      </center>
    @endif

		</div>
	</div>		
</div>
</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
  <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
  </style>
@endpush

@push('scripts') 
    <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
<script>

    $("#vehiculo_id").select2({
        placeholder: "Selecione un vehículo",
        language: "es",
        allowClear: true
    });
  </script>
    
@endpush