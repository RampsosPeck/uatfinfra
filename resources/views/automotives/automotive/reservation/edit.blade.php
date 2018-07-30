@extends('automotives.layout')
<?php use Carbon\Carbon;?>
@section('content')
<div class="container">
<br><br>
<div class="col-md-3">
</div>
<div class="col-md-6">
    <div class="box box-info">
        <div class="box-header with-border">
          <CENTER><h3 class="box-title"><b>EDITAR LA RESERVA</b></h3></CENTER>
        </div>
        <div class="box-body" STYLE="background:#bce8f1" >
    	{!! Form::model($reservas,['route'=>['reservas.update',$reservas->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
              {{ csrf_field() }}
		
            
			<div class="form-group {{ $errors->has('startdate') ? 'has-error' : '' }}">
                <label for="startdate" class="col-sm-3 control-label">Fecha Inicial:</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input name="startdate" 
                            type="text" 
                            class="form-control pull-right" 
                            id="datepicker1"
                            value="{{ old('startdate', Carbon::parse($reservas->startdate)->format('Y/m/d')) }}">
                        <spam class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </spam>
                    </div>
                    {!! $errors->first('startdate', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        	<div class="form-group {{ $errors->has('enddate') ? 'has-error' : '' }}">
                <label for="enddate" class="col-sm-3 control-label">Fecha Final:</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input name="enddate" 
                        type="text" 
                        class="form-control pull-right" 
                        id="datepicker2"
                        value="{{ old('enddate', Carbon::parse($reservas->enddate)->format('Y/m/d')) }}">
                  		<spam class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                </spam>
                    </div>
                    {!! $errors->first('enddate', '<span class="help-block">:message</span>') !!}
                </div>        
            </div>
            @if (Auth::user()->type == "Jefatura" OR Auth::user()->type == "Supervisor" OR Auth::user()->type == "Administrator")
            	<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                	<label for="user_id" class="col-sm-3 control-label">Encargado:</label>
                	<div class="col-md-8 input-group">	
                			<select name="user_id" class="form-control select2" data-placeholder="Seleccione un encargado" style="width: 100%;">
                			<option value="">Seleccione un encargado</option>
                			@foreach ($users as $user)
                			    <option value="{{ $user->id }}"
                                  {{ old('user_id', $reservas->user_id) == $user->id ? 'selected' : '' }}> {{ $user->name }} </option>
                			@endforeach
                			</select>
                	   {!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
            	    </div>   
                </div>
            @else
            	<?php $id = Auth::user()->id; ?>
            	<input type="hidden" name="user_id" value="{{ $id }}" >
            @endif
                    
                   
        	<div class="form-group {{ $errors->has('entity') ? 'has-error' : '' }}">
                <label for="entity" class="	col-sm-3 control-label">Entidad: </label>
               	<div class="col-md-8 input-group">	
                    <input type="text" 
                    	class="form-control" 
                    	name="entity" 
                    	id="entity" 
                    	placeholder="Ejm. Carrera de Ing. de Sistemas"
                        value="{{ old('entity', $reservas->entity) }}">
                
                {!! $errors->first('entity', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        	<div class="form-group {{ $errors->has('objetive') ? 'has-error' : '' }}">
                <label for="objetive" class="col-sm-3 control-label">Objetivo:</label>
                <div class="col-md-8 input-group">	 
                    {!! Form::textarea('objetive',old('objetive', $reservas->objetive),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Indique el objetivo y los lugares de práctica. Maximo 200 caracteres.']) !!}
                    {!! $errors->first('objetive', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('passengers') ? 'has-error' : '' }}">
                <label for="passengers" class="col-sm-3	control-label">Pasajeros:</label>
                <div class="col-md-8 input-group">		
                    <input type="number" 
                    	class="form-control" 
                    	id="passengers" 
                    	name="passengers" 
                    	placeholder="Ejm. 37"
                        value="{{ old('passengers', $reservas->passengers) }}">
                {!! $errors->first('passengers', '<span class="help-block">:message</span>') !!}
                </div>
            </div>



			
		    <center>
		      <button type="submit" class="btn btn-sm btn-primary">
		        <b>Guardar la solicitud</b> <i class="fa fa-check-square-o" aria-hidden="true"></i>
		      </button>
		    </center>

		{!! Form::close() !!}
		<center> <br />
		 {!! Form::open(['route'=>['reservas.destroy',$reservas->id],'method'=>'DELETE']) !!}
		                <button type="submit" class="btn btn-danger btn-sm " onClick="javascript: return confirm('¿Estas seguro de eliminar la reserva?');">
		                   <b>Eliminar la solicitud</b> <i class="fa fa-trash" aria-hidden="true"></i> 
		                </button>
		{!! Form::close() !!}
		</center>
		</div>
	</div>		
</div>
</div>
@endsection


@push('styles')

  <link rel="stylesheet" href="/dashboard/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
    <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
    </style>
@endpush

@push('scripts')
<!-- bootstrap datepicker -->
   <script src="/dashboard/plugins/datepicker/bootstrap-datepicker.js"></script>  
   <script src="/dashboard/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>  
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
<script>
//Date picker
    $('#datepicker1').datepicker({
      format: 'yyyy-mm-dd'
    });

    $('#datepicker2').datepicker({
      format: 'yyyy-mm-dd'
    });
    $(".select2").select2();
</script>
@endpush
