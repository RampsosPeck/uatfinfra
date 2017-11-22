@extends('automotives.layout')

@section('content')

<div class="container">
	<div class="col-md-11">
    <!-- Horizontal Form -->
        <div class="box box-primary">
        	<font color="#007bff"><span class="fa fa-bus fa-2x form-control-feedback"></span></font>
            <div class="box-header with-border">
              	<center>
              		<h3 class="box-title">
              			<font color="#007bff"><b>INSERTAR A UN NUEVO DESTINO</b></font>
          			</h3>
          		</center>
            </div>
            <span class="input-group-addon" id="basic-addon1">
				Los campos con el icono 
				<font color="red">
			        <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			    </font>
			    son obligatorios.
			</span>  
            <!-- form start -->
             {!! Form::open(['route'=>'destinos.store','method'=>'POST','class'=>'form-horizontal']) !!}
            	{{ csrf_field() }}
                <div class="box-body alert-info">
            		<div class="col-md-7">
	                	
		                <div class="form-group {{ $errors->has('origen') ? 'has-error' : '' }}">
		                    <label for="origen" class="col-sm-4 control-label">Lugar de partida:</label>
		                    <div class="col-sm-8">
		                    	<div class="input-group">
			                    	<input type="text" class="form-control" name="origen" id="origen" placeholder="Ejm. Plaza los conciertos" value="{{ old('origen') }}">
			                    	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                    {!! $errors->first('origen', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
		                <div class="form-group {{ $errors->has('dep_inicio') ? 'has-error' : '' }}">
		                    <label for="dep_inicio" class="col-sm-4 control-label">Depto. de partida:</label>
			                <div class="col-sm-8">
			                	<div class="input-group">
			                		{!! Form::select('dep_inicio', config('tipo.depinicio'), null, ['class' => 'form-control  select2','placeholder'=>'Ejm. Potosí','required','style'=>'width: 100%;','id'=>'dep_inicio']) !!}
			                    	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                	{!! $errors->first('dep_inicio', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
		                <div class="form-group {{ $errors->has('destino') ? 'has-error' : '' }}">
		                    <label for="destino" class="col-sm-4 control-label">Lugar de llegada:</label>
		                    <div class="col-sm-8">
		                    	<div class="input-group">
		                        	<input type="text" class="form-control" name="destino" placeholder="Ejm. terminal de buses" required value="{{ old('destino') }}">
		                        	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                	{!! $errors->first('destino', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
	                    <div class="form-group {{ $errors->has('dep_final') ? 'has-error' : '' }}">
		                    <label for="dep_final" class="col-sm-4 control-label">Depto. de llegada:</label>
			                <div class="col-sm-8">
			                	<div class="input-group">
			                		{!! Form::select('dep_final', config('tipo.depinicio'), null, ['class' => 'form-control  select2','placeholder'=>'Ejm. Potosí','required','style'=>'width: 100%;','id'=>'dep_final']) !!}
			                    	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                	{!! $errors->first('dep_final', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
                    </div>
                    <div class="col-md-5">
	                    <div class="form-group {{ $errors->has('kilometraje') ? 'has-error' : '' }}">
		                    <label for="kilometraje" class="col-sm-4 control-label">Kilometraje:</label>
			                <div class="col-sm-8">

			                	<div class="input-group">
			                    	<input type="number" class="form-control" name="kilometraje" placeholder="Ejm. 520" value="{{ old('kilometraje') }}" required>
			                    	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                    {!! $errors->first('kilometraje', '<span class="help-block">:message</span>') !!}
			                </div>
			            </div>
		                <div class="form-group {{ $errors->has('tiempo') ? 'has-error' : '' }} ">
		                    <label for="tiempo" class="col-sm-4 control-label">Tiempo:</label>
			                <div class="col-sm-8" >
				                <div class="bootstrap-timepicker">
					                <div class="form-group">
					                  <div class="input-group">
					                    <input type="text" class="form-control timepicker" name="tiempo" value="{{ old('tiempo') }}">
					                    <div class="input-group-addon">
					                      <i class="fa fa-clock-o"></i>
					                    </div>
					                  </div>
					                  <!-- /.input group -->
					                </div>
					                <!-- /.form group -->
				                </div>
			                    {!! $errors->first('tiempo', '<span class="help-block">:message</span>') !!}
				            </div>
		                </div>
	                	<div class="form-group {{ $errors->has('ruta') ? 'has-error' : '' }} ">
		                    <label for="ruta" class="col-sm-4 control-label">Ruta:</label>
		                    <div class="col-sm-8">
								<textarea name="ruta" 
									class="form-control"
									placeholder="Ingresa aqui la ruta del destino">{{ old('ruta') }}
								</textarea>
								{!! $errors->first('ruta', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
                    </div>
              	</div>
              	<!-- /.box-body -->
              	<div class="box-footer">
              		<center>
                	<button type="submit" class="btn btn-success">Guardar los datos</button>
              		</center>
              	</div>
              	<!-- /.box-footer -->
            {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="/dashboard/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="/dashboard/plugins/timepicker/bootstrap-timepicker.css">

@endpush

@push('scripts') 
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
   <script src="/dashboard/plugins/timepicker/bootstrap-timepicker.min.js"></script>
   <script src="/dashboard/plugins/timepicker/bootstrap-timepicker.js"></script>

<script>
//Date picker
    $("#dep_inicio").select2({
    	placeholder: "Seleccione un departamento",
    	language: "es",
    	maximumSelectionLength: 2
    });
    $("#dep_final").select2({
    	placeholder: "Seleccione un conductor",
    	language: "es",
    	maximumSelectionLength: 2
    });
    $('.timepicker').timepicker({
      showInputs: false
    });
   
</script> 
@endpush



