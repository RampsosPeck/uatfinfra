@extends('automotives.layout')

@section('content')

<div class="container">
	<div class="col-md-12">
    <!-- Horizontal Form -->
        <div class="box box-primary">
        	<font color="#007bff"><span class="fa fa-bus fa-2x form-control-feedback"></span></font>
            <div class="box-header with-border">
              	<center>
              		<h3 class="box-title">
              			<font color="#007bff"><b>INSERTAR UN NUEVO VIAJE</b></font>
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
             {!! Form::open(['route'=>'viajes.store','method'=>'POST','class'=>'form-horizontal']) !!}
            	{{ csrf_field() }}
           
                <div class="box-body alert-info">
            		
            		<div class="col-md-7">
            			<div class="form-group {{ $errors->has('destino1') ? 'has-error' : '' }}">
		                    <div class="col-sm-9">
			                	<center><label for="kilometraje">DESTINOS</label></center>
		                    	<select name="destino1" 
		                    		class="form-control select2" 
		                    		id="destino1">
									<option value="">Seleccione un destino</option>
										@foreach ($destinos as $destino)
											<option value="{{ $destino->id }}" 
												>
												{{ $destino->origen }} HASTA {{ $destino->destino }}</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
		                    	<center><label for="kilometraje">KM.</label></center>
								<div class="input-group">
	                				<input class="form-control" id="kilo1" type="text" name="kilo1">
									<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
				                </div>
							</div>
							{!! $errors->first('destino1', '<span class="help-block">:message</span>') !!}
	                    </div>
	                    <div class="form-group {{ $errors->has('destino2') ? 'has-error' : '' }}">
		                    <div class="col-sm-9">
			                	<select name="destino2" 
		                    		class="form-control select2" 
		                    		id="destino2">
									<option value="">Seleccione un destino</option>
										@foreach ($destinos as $destino)
											<option value="{{ $destino->id }}" 
												>
												{{ $destino->origen }} HASTA {{ $destino->destino }}</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								<div class="input-group">
	                				<input class="form-control" id="kilo2" type="text" name="kilo2">
									<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
				                </div>
							</div>
							{!! $errors->first('destino2', '<span class="help-block">:message</span>') !!}
	                    </div>
	                    <div class="form-group {{ $errors->has('destino3') ? 'has-error' : '' }}">
		                    <div class="col-sm-9">
			                	<select name="destino3" 
		                    		class="form-control select2" 
		                    		id="destino3">
									<option value="">Seleccione un destino</option>
										@foreach ($destinos as $destino)
											<option value="{{ $destino->id }}" 
												>
												{{ $destino->origen }} HASTA {{ $destino->destino }}</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								<input class="form-control" id="kilo3" type="text" name="kilo3">
							</div>
							{!! $errors->first('destino3', '<span class="help-block">:message</span>') !!}
	                    </div>
	                    <div class="form-group {{ $errors->has('destino4') ? 'has-error' : '' }}">
		                    <div class="col-sm-9">
			                	<select name="destino4" 
		                    		class="form-control select2" 
		                    		id="destino4">
									<option value="">Seleccione un destino</option>
										@foreach ($destinos as $destino)
											<option value="{{ $destino->id }}" 
												>
												{{ $destino->origen }} HASTA {{ $destino->destino }}</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								<input class="form-control" id="kilo4" type="text" name="kilo4">
							</div>
							{!! $errors->first('destino4', '<span class="help-block">:message</span>') !!}
	                    </div>
	                    <div class="form-group {{ $errors->has('destino5') ? 'has-error' : '' }}">
		                    <div class="col-sm-9">
			                	<select name="destino5" 
		                    		class="form-control select2" 
		                    		id="destino5">
									<option value="">Seleccione un destino</option>
										@foreach ($destinos as $destino)
											<option value="{{ $destino->id }}" 
												>
												{{ $destino->origen }} HASTA {{ $destino->destino }}</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								<input class="form-control" id="kilo5" type="text" name="kilo5">
							</div>
							{!! $errors->first('destino5', '<span class="help-block">:message</span>') !!}
	                    </div>
		                <div class="form-group {{ $errors->has('destino6') ? 'has-error' : '' }}">
		                    <div class="col-sm-9">
			                	<select name="destino6" 
		                    		class="form-control select2" 
		                    		id="destino6">
									<option value="">Seleccione un destino</option>
										@foreach ($destinos as $destino)
											<option value="{{ $destino->id }}" 
												>
												{{ $destino->origen }} HASTA {{ $destino->destino }}</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								<input class="form-control" id="kilo6" type="text" name="kilo6">
							</div>
							{!! $errors->first('destino6', '<span class="help-block">:message</span>') !!}
	                    </div>
		                <div class="form-group ">
		                    <label for="tipo" class="col-sm-2 control-label">Adicional:</label>
		                    <div class="col-sm-4">
			                	<div class="input-group {{ $errors->has('adicional') ? 'has-error' : '' }}">
		                        	<input type="number" class="form-control" name="adicional" placeholder="Ejm. 40" value="{{ old('adicional') }}">
		                       		 <span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
		                        {!! $errors->first('adicional', '<span class="help-block">:message</span>') !!}
		                    </div>
		                    <label for="tipo" class="col-sm-3 control-label">Total Km.:</label>
		                    <div class="col-md-3">
								<div class="input-group {{ $errors->has('totalkm') ? 'has-error' : '' }}">
		                        	<input type="text" class="form-control" name="totalkm" placeholder="total" value="{{ old('totalkm') }}">
		                       		 <span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
		                        {!! $errors->first('totalkm', '<span class="help-block">:message</span>') !!}
							</div>
	                    </div>
                    </div>
                    <div class="col-md-5">
	                	<center><label for="kilometraje">DATOS OBLIGATORIOS</label></center>
		                <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
		                    <label for="tipo" class="col-sm-4 control-label">Tipo de Viaje:</label>
		                    <div class="col-sm-8">
		                    	<div class="input-group">
		                        	<input type="text" class="form-control" name="tipo" placeholder="Ejm. Viaje de Práctica" value="{{ old('tipo') }}">
		                       		 <span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
		                        {!! $errors->first('tipo', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
		                <div class="form-group {{ $errors->has('encargado') ? 'has-error' : '' }}">
		                    <label for="encargado" class="col-sm-4 control-label">Encargado:</label>
			                <div class="col-sm-8">
			                    <div class="input-group">
			                    	<select name="encargado" class="form-control select2" id="encargado" required>
			                    		<option >Seleccione un encargado</option>
											@foreach ($encargados as $encargado)
												 <option >{{ $encargado->name }}</option>
											@endforeach
									</select>
									<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
			                    {!! $errors->first('encargado', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
                    	<div class="form-group {{ $errors->has('conductor') ? 'has-error' : '' }}">
		                    <label for="conductor" class="col-sm-4 control-label">Conductor:</label>
		                    <div class="col-sm-8">
		                        <div class="input-group">
			                    	<select name="conductor" class="form-control select2" id="conductor" required>
			                    		<option >Seleccione un conductor</option>
											@foreach ($conductores as $conductor)
												 <option >{{ $conductor->name }}</option>
											@endforeach
									</select>
									<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
		                        {!! $errors->first('conductor', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
	                    <div class="form-group {{ $errors->has('vehiculo') ? 'has-error' : '' }}">
		                    <label for="vehiculo" class="col-sm-4 control-label">Vehículo:</label>
			                <div class="col-sm-8">
			                    <div class="input-group">
			                    	<select name="vehiculo" class="form-control select2" id="vehiculo" required>
			                    		<option >Seleccione un vehiculo</option>
											@foreach ($vehiculos as $vehiculo)
												 <option >{{ $vehiculo->name }}</option>
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
	                    <div class="form-group {{ $errors->has('entidad') ? 'has-error' : '' }}">
		                    <label for="entidad" class="col-sm-4 control-label">Entidad:</label>
			                <div class="col-sm-8">
			                    <div class="input-group">
			                    	<input type="text" class="form-control" name="entidad" id="entidad" placeholder="Ejm. Carrera de Ing. de Sistemas" value="{{ old('entidad') }}">
			                    	<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
			                    {!! $errors->first('entidad', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
		                <div class="form-group {{ $errors->has('dias') ? 'has-error' : '' }}">
		                    <label for="dias" class="col-sm-4 control-label">Dias:</label>
			                <div class="col-sm-8">
			                	<div class="input-group">
			                    	<input type="text" class="form-control" name="dias" placeholder="Ejm. 2 dias" value="{{ old('dias') }}">
			                    	<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
			                    {!! $errors->first('dias', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
	                    <div class="form-group {{ $errors->has('pasajeros') ? 'has-error' : '' }}">
		                    <label for="pasajeros" class="col-sm-4 control-label">Pasajeros:</label>
			                <div class="col-sm-8">
			                	<div class="input-group">
			                    	<input type="number" class="form-control" name="pasajeros" id="pasajeros" placeholder="Ejm. 47" value="{{ old('pasajeros') }}">
			                    	<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
			                    {!! $errors->first('pasajeros', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
		                
                    </div>
              	</div><br>
              	<div class="col-md-12">
	                    <div class="form-group">
		                    <label for="fecha_inicial" class="col-sm-1 control-label">Inicio:</label>
			                <div class="col-sm-3  {{ $errors->has('fecha_inicial') ? 'has-error' : '' }}">
			                    <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input name="fecha_inicial" 
				                  		class="form-control" 
				                  		type="date" 
										value="{{ old('fecha_inicial') }}" 
				                  		id="datepicker">
				                  		<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      						</span>
				                </div>
			                    {!! $errors->first('fecha_inicial', '<span class="help-block">:message</span>') !!}
			                </div>
		                	<div class="col-sm-2" >
				                <div class="bootstrap-timepicker">
					                <div class="form-group">
					                  <div class="input-group">
					                    <input type="text" class="form-control timepicker" name="horainicio">
					                    <div class="input-group-addon">
					                      <i class="fa fa-clock-o"></i>
					                    </div>
					                  </div>
					                  <!-- /.input group -->
					                </div>
					                <!-- /.form group -->
				                </div>
				            </div>
		                    <label for="fecha_inicial" class="col-sm-1 control-label">Final:</label>
			                <div class="col-sm-3  {{ $errors->has('fecha_final') ? 'has-error' : '' }}">
			                    <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input name="fecha_final" 
				                  		class="form-control" 
				                  		type="date" 
										value="{{ old('fecha_final') }}" 
				                  		id="datepickere">
				                  		<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      						</span>
				                </div>
			                    {!! $errors->first('fecha_final', '<span class="help-block">:message</span>') !!}
			                
				             </div>
				             <div class="col-sm-2" >
				                <div class="bootstrap-timepicker">
					                <div class="form-group">
					                  <div class="input-group">
					                    <input type="text" class="form-control timepicker" name="horafinal">
					                    <div class="input-group-addon">
					                      <i class="fa fa-clock-o"></i>
					                    </div>
					                  </div>
					                  <!-- /.input group -->
					                </div>
					                <!-- /.form group -->
				                </div>
				            </div>
		                </div>
	                </div>
				<div class="form-group text-center">
	                <label>
	                	Viaje con recursos de la U.A.T.F.
	                  <input type="radio" name="r3" value="viajeuatf" class="flat-red">
	                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                <label>
	                	Viaje con recursos de los estudiantes y/o encargados:
	                  <input type="radio" name="r3" value="viajepropio" class="flat-red" checked>
	                </label>
	  			</div>
              	<div class="box-header with-border">
	              	<center>
	              		<h3 class="box-title">
	              			<font color="#007bff"><b>PRESUPUESTO DE VIAJE</b></font>
	          			</h3>
	          		</center>
	            </div>
              	<div class="box-body alert-warning">
              		<center>
              		<label class="control-label">COMBUSTIBLE:</label></center>
              		<div class="form-group">
	                    <div class="{{ $errors->has('combustible') ? 'has-error' : '' }}">
		                    <label for="tipo" class="col-sm-2 control-label">Diesel/Gasolina:</label>
		                    <div class="col-sm-2">
		                    	<div class="input-group">
		                        	<input type="text" class="form-control" name="combustible" placeholder="4 o 6 o 3.5" value="{{ old('combustible') }}">
		                        	<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
		                    	{!! $errors->first('adicional', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('totalcombu') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       		<input type="text" class="form-control" name="totalcombu" placeholder="Total litros" value="{{ old('totalcombu') }}">
								{!! $errors->first('totalcombu', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('precio') ? 'has-error' : '' }}">
		                    <label for="precio" class="col-sm-2 control-label">Precio:</label>
		                    <div class="col-sm-2">
		                    	<div class="input-group">
		                        	<input type="text" class="form-control" name="precio" placeholder="Ejm. 3.72" value="{{ old('precio') }}">
		                        	<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
		                    	{!! $errors->first('precio', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('totalpre') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="totalpre" placeholder="Total Bs." value="{{ old('totalpre') }}">
		                       	{!! $errors->first('totalpre', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
                    </div>
					<center><label for="viaticos">GASTOS</label></center>
                    <div class="form-group">
	                    <div class="{{ $errors->has('canpeaje') ? 'has-error' : '' }}">
		                    <label for="canpeaje" class="col-sm-1 control-label">Peaje:</label>
		                    <div class="col-sm-1">
		                        <input type="text" class="form-control" name="canpeaje" placeholder="1" value="{{ old('canpeaje') }}">
		                    	{!! $errors->first('canpeaje', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('prepeaje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="prepeaje" placeholder="Ejm. 100"  value="{{ old('prepeaje') }}">
								{!! $errors->first('prepeaje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totpeaje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="totpeaje" placeholder="Total Bs." value="{{ old('totpeaje') }}">
								{!! $errors->first('totpeaje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('cangaraje') ? 'has-error' : '' }}">
		                    <label for="cangaraje" class="col-sm-1 control-label">Garaje:</label>
		                    <div class="col-sm-1">
		                        <input type="text" class="form-control" name="cangaraje" placeholder="1" value="{{ old('cangaraje') }}">
		                    	{!! $errors->first('cangaraje', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('pregaraje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="pregaraje" placeholder="Ejm. 150" value="{{ old('pregaraje') }}">
		                       	{!! $errors->first('pregaraje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totgaraje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="totgaraje" placeholder="Total Bs." value="{{ old('totgaraje') }}">
		                       	{!! $errors->first('totgaraje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="{{ $errors->has('nommante') ? 'has-error' : '' }}">
		                    <label for="cangaraje" class="col-sm-2 control-label">Mantenimiento/Nombre:</label>
		                    <div class="col-sm-4">
		                        <input type="text" class="form-control" name="cangaraje" placeholder="Parchado de llantas o mantenimiento" value="{{ old('cangaraje') }}">
		                    	{!! $errors->first('cangaraje', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('pregaraje') ? 'has-error' : '' }}">
		                	<label for="cangaraje" class="col-sm-1 control-label">Cant.:</label>
		                    <div class="col-md-1">
		                       	<input type="text" class="form-control" name="pregaraje" placeholder="1" value="{{ old('pregaraje') }}">
		                       	{!! $errors->first('pregaraje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totgaraje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="totgaraje" placeholder="Ejm. 50" value="{{ old('totgaraje') }}">
		                       	{!! $errors->first('totgaraje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="{{ $errors->has('totgaraje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="totgaraje" placeholder="Total Bs." value="{{ old('totgaraje') }}">
		                       	{!! $errors->first('totgaraje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
					</div>
					<center><label for="viaticos">VIATICOS</label></center>
					<div class="form-group">
						<div class="{{ $errors->has('canviaciu') ? 'has-error' : '' }}">
		                    <label for="canviaciu" class="col-sm-1 control-label">Ciudad:</label>
		                    <div class="col-sm-1">
		                        <input type="text" class="form-control" name="canviaciu" placeholder="1" value="{{ old('canviaciu') }}">
		                    	{!! $errors->first('canviaciu', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('previaciu') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="previaciu" placeholder="Ejm. 150" value="{{ old('previaciu') }}">
		                       	{!! $errors->first('previaciu', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totviaciu') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="totviaciu" placeholder="Total Bs." value="{{ old('totviaciu') }}">
		                       	{!! $errors->first('totviaciu', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="{{ $errors->has('canviapro') ? 'has-error' : '' }}">
		                    <label for="canviapro" class="col-sm-1 control-label">Provincia:</label>
		                    <div class="col-sm-1">
		                        <input type="text" class="form-control" name="canviapro" placeholder="1" value="{{ old('canviapro') }}">
		                    	{!! $errors->first('canviapro', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('previapro') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="previapro" placeholder="Ejm. 150" value="{{ old('previapro') }}">
		                       	{!! $errors->first('previapro', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totviapro') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="totviapro" placeholder="Total Bs." value="{{ old('totviapro') }}">
		                       	{!! $errors->first('totviapro', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="{{ $errors->has('canviafro') ? 'has-error' : '' }}">
		                    <label for="canviafro" class="col-sm-1 control-label">Frontera:</label>
		                    <div class="col-sm-1">
		                        <input type="text" class="form-control" name="canviafro" placeholder="1" value="{{ old('canviafro') }}">
		                    	{!! $errors->first('canviafro', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('previafro') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="previafro" placeholder="Ejm. 150" value="{{ old('previafro') }}">
		                       	{!! $errors->first('previafro', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totviafro') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<input type="text" class="form-control" name="totviafro" placeholder="Total Bs." value="{{ old('totviafro') }}">
		                       	{!! $errors->first('totviafro', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totprebol') ? 'has-error' : '' }}">
		                    <label for="totprebol" class="col-sm-3 control-label">Total Bs.:</label>
		                    <div class="col-sm-3">
		                       	<input type="text" class="form-control" name="totprebol" placeholder="Total Bs." value="{{ old('totprebol') }}">
		                       	{!! $errors->first('totprebol', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
                    </div>
                    <center><label for="nota">OBJETIVO / NOTA</label></center>
                    <div class="form-group">
	                    <div class="{{ $errors->has('nota') ? 'has-error' : '' }}">
		                    <div class="col-sm-12">
		                        <input type="text" class="form-control" name="nota" placeholder="Ejm. Viaje de la carrera de Sistemas con sus propios recursos al congreso nacional de computación." value="{{ old('nota') }}">
		                    	{!! $errors->first('nota', '<span class="help-block">:message</span>') !!}
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
  <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css"> 
  <link rel="stylesheet" href="/adminlte/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/iCheck/all.css">
@endpush

@push('scripts') 
   <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
   <script src="/adminlte/plugins/select2/es.js"></script>
   <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
   <script src="/adminlte/plugins/timepicker/bootstrap-timepicker.min.js"></script>
   <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
//Date picker
	$('.timepicker').timepicker({
      showInputs: false
    });
	$('#datepicker').datepicker({
	      autoclose: true,
	      todayHighlight:true
	    });
	$('#datepickere').datepicker({
	      autoclose: true
	    });
    $("#destino1").select2({
    	placeholder: "Seleccione un destino",
    	language: "es",
    	maximumSelectionLength: 2
    });
    $("#destino2").select2({
    	placeholder: "Seleccione un destino",
    	language: "es",
    	maximumSelectionLength: 2
    });
    $("#destino3").select2({
    	placeholder: "Seleccione un destino",
    	language: "es",
    	maximumSelectionLength: 2
    });
    $("#destino4").select2({
    	placeholder: "Seleccione un destino",
    	language: "es",
    	maximumSelectionLength: 2
    });
    $("#destino5").select2({
    	placeholder: "Seleccione un destino",
    	language: "es",
    	maximumSelectionLength: 2
    });
    $("#destino6").select2({
    	placeholder: "Seleccione un destino",
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
    $("#encargado").select2({
    	placeholder: "Seleccione un encargado",
    	language: "es",
		maximumSelectionLength: 2
    });
    $("#conductor").select2({
    	placeholder: "Seleccione un conductor",
    	language: "es",
		maximumSelectionLength: 2
    });
    $("#vehiculo").select2({
    	placeholder: "Seleccione un conductor",
    	language: "es",
		maximumSelectionLength: 2
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
</script>
@endpush


