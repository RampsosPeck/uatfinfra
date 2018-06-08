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
              			<font color="#007bff"><b>INSERTAR A UN NUEVO VEHÍCULO</b></font>
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
             {!! Form::open(['route'=>'vehiculos.store','method'=>'POST','class'=>'form-horizontal']) !!}
            	{{ csrf_field() }}
           
                <div class="box-body"  style="background-color: #bce8f1;">
            		<div class="col-md-6">
	                	<div class="form-group {{ $errors->has('oil_id') ? 'has-error' : '' }}">
		                    <label for="oil" class="col-sm-4 control-label">Combustible:</label>
			                <div class="col-sm-8">
			                	<div class="input-group">
			                    	<select name="oil_id[]" multiple="multiple" class="form-control select2" id="oil_id" >
											@foreach ($oils as $oil)
												 <option {{ collect(old('oil_id'))->contains($oil->id) ? 'selected' : '' }} value="{{ $oil->id }}">{{ $oil->name }}</option>
											@endforeach
									</select>
			                    	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                	{!! $errors->first('oil_id', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
	                	<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
		                    <label for="user_id" class="col-sm-4 control-label">Asignado A:</label>
			                <div class="col-sm-8">
			                	<select name="user_id" multiple="multiple" class="form-control select2" id="user_id">
									<option value="">Seleccione un conductor</option>
										@foreach ($users as $user)
											<option value="{{ $user->id }}" 
												{{ old('user_id', $user->user_id ) == $user->id ? 'selected' : '' }}>
												{{ $user->name }}</option>
										@endforeach
								</select>
								{!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
		                <div class="form-group {{ $errors->has('kilometraje') ? 'has-error' : '' }}">
		                    <label for="kilometraje" class="col-sm-4 control-label">Kilometraje:</label>
		                    <div class="col-sm-8">
		                        <input type="number" 
		                        class="form-control" 
		                        name="kilometraje"
		                        value="{{ old('kilometraje') }}"
		                        placeholder="Ejm. 1562">
		                        {!! $errors->first('kilometraje', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
		                <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
		                    <label for="estado" class="col-sm-4 control-label">Estado:</label>
			                <div class="col-sm-8">
			                	<div class="input-group">
			                		{!! Form::select('estado', config('tipo.vehi'), null, ['class' => 'form-control  select2','placeholder'=>'Ejm. Óptimo','style'=>'width: 100%;','id'=>'estado']) !!}

			                    	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                	{!! $errors->first('estado', '<span class="help-block">:message</span>') !!}
			                </div>

		                </div>
		                <div class="form-group {{ $errors->has('placa') ? 'has-error' : '' }}">
		                    <label for="placa" class="col-sm-4 control-label">Placa:</label>
		                    <div class="col-sm-8">
		                    	<div class="input-group">
		                        	<input type="text" class="form-control" name="placa" placeholder="Ejm. 1325 RKU"  value="{{ old('placa') }}">
		                        	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                	{!! $errors->first('placa', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
	                    <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
		                    <label for="tipo" class="col-sm-4 control-label">Tipo:</label>
			                <div class="col-sm-8">
			                    <div class="input-group">
			                    	<input type="text" class="form-control" name="tipo" placeholder="Ejm. Vagoneta"  value="{{ old('tipo') }}">
			                    	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                	{!! $errors->first('tipo', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>

                    </div>
                    <div class="col-md-6">
                    	
	                	<div class="form-group {{ $errors->has('especificacion') ? 'has-error' : '' }}">
		                    <label for="especificacion" class="col-sm-4 control-label">M. Específico:</label>
		                    <div class="col-sm-8">
		                        <input type="text" class="form-control" name="especificacion" placeholder="Ejm. Land Cruzer" value="{{ old('especificacion') }}">
		                        {!! $errors->first('especificacion', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
	                    <div class="form-group {{ $errors->has('cilindrada') ? 'has-error' : '' }}">
		                    <label for="cilindrada" class="col-sm-4 control-label">Cilindrada:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" name="cilindrada" placeholder="Ejm. 10305" value="{{ old('cilindrada') }}">
			                    {!! $errors->first('cilindrada', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
		                <div class="form-group {{ $errors->has('chasis') ? 'has-error' : '' }}">
		                    <label for="chasis" class="col-sm-4 control-label">Chasis:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" name="chasis" id="chasis" placeholder="Ejm. AMDIJCUE12" value="{{ old('chasis') }}">
			                    {!! $errors->first('chasis', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
	                	<div class="form-group {{ $errors->has('motor') ? 'has-error' : '' }}">
		                    <label for="motor" class="col-sm-4 control-label">Motor:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" name="motor" id="motor" placeholder="Ejm. MSDUFN125112" value="{{ old('motor') }}">
			                    {!! $errors->first('motor', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
		                <div class="form-group">
		                    <label for="marca" class="col-sm-2 control-label">Marca:</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="marca" id="marca" value="{{ old('marca') }}" placeholder="Ejm. Toyota">
			                    {!! $errors->first('marca', '<span class="help-block">:message</span>') !!}
			                </div>
			                <label for="pasajeros" class="col-sm-2 control-label">Pasajeros:</label>
			                <div class="col-sm-4">
				                <div class="input-group {{ $errors->has('pasajeros') ? 'has-error' : '' }}">    
				                    <input type="number" class="form-control" name="pasajeros" id="pasajeros" value="{{ old('pasajeros') }}" placeholder="Ejm. 45">
				                    
				                    <span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>

			                	</div>
			                    {!! $errors->first('pasajeros', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
	                	<div class="form-group">
		                    <label for="modelo" class="col-sm-2 control-label">Modelo:</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Ejm. 2008" value="{{ old('modelo') }}">
			                    {!! $errors->first('modelo', '<span class="help-block">:message</span>') !!}
			                </div>
			                <label for="color" class="col-sm-2 control-label">Color:</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="color" id="color" placeholder="Ejm. Guindo" value="{{ old('color') }}">
			                    {!! $errors->first('color', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
                    </div>
                   
              	</div>
              	<div class="col-md-4 collect">
              		
              	</div>
              	<!-- /.box-body -->
              	<div class="box-footer">
              		<center>
                	<button type="submit" class="btn btn-success">Guardar los datos</button>
              		</center>
              	</div>
              	<!-- /.box-footer -->
            {!! Form::close() !!}
		
		<!--<div class="col-md-12" style="background-color: #bce8f1;">
			<div  class="col-md-3" >
	        	<B style="float:right;">	FOTOS: </B>
	        </div>
	  		<div  class="col-md-6" >
	  			<div class="dropzone">
	  			
	  			</div>
	  		</div>
		</div>-->
		</div>
	</div>
</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css">
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
  <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        } 
}
  </style>
@endpush

@push('scripts') 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>

<script>
//Date picker
    $("#oil_id").select2({
    	placeholder: "Seleccione un combustible",
    	language: "es",
    	maximumSelectionLength: 2
    });
    $("#user_id").select2({
    	placeholder: "Seleccione un conductor",
    	language: "es",
    	maximumSelectionLength: 1,
		allowClear: true
    });
    $("#estado").select2({
    	placeholder: "Seleccione una opción",
    	language: "es",
		allowClear: true
    });

</script>
@endpush



