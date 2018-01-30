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
			                	<center><label for="destinos">DESTINOS</label></center>
		                    	<select name="destino1"
		                    		class="form-control select2"
		                    		id="destino1">
									<option value="">Seleccione un destino</option>
										@foreach ($destinos as $destino)
											<option value="{{ $destino->id }}" {{ old('destino1', $destino->destino1 ) == $destino->id ? 'selected' : '' }}> 
												({{ $destino->dep_inicio }}) {{ $destino->origen }} HASTA {{ $destino->destino }} ({{ $destino->dep_final }})
											</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
		                    	<center><label for="kilometraje">KM.</label></center>
								<div class="input-group">
	                				{!! Form::text('kilo1',null,['class'=>'form-control','id'=>'kilo1','value'=>'0']) !!}
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
											<option value="{{ $destino->id }}" {{ old('destino2', $destino->destino2 ) == $destino->id ? 'selected' : '' }}>
												({{ $destino->dep_inicio }}) {{ $destino->origen }} HASTA {{ $destino->destino }} ({{ $destino->dep_final }})
											</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								<div class="input-group">
	                				{!! Form::text('kilo2',null,['class'=>'form-control','id'=>'kilo2','value'=>'0']) !!}
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
											<option value="{{ $destino->id }}" {{ old('destino3', $destino->destino3 ) == $destino->id ? 'selected' : '' }}>
												({{ $destino->dep_inicio }}) {{ $destino->origen }} HASTA {{ $destino->destino }} ({{ $destino->dep_final }})
											</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								{!! Form::text('kilo3',null,['class'=>'form-control','id'=>'kilo3','value'=>'0']) !!}
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
											<option value="{{ $destino->id }}" {{ old('destino4', $destino->destino4 ) == $destino->id ? 'selected' : '' }}>
												({{ $destino->dep_inicio }}) {{ $destino->origen }} HASTA {{ $destino->destino }} ({{ $destino->dep_final }})
											</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								{!! Form::text('kilo4',null,['class'=>'form-control','id'=>'kilo4','value'=>'0']) !!}
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
											<option value="{{ $destino->id }}" {{ old('destino5', $destino->destino5 ) == $destino->id ? 'selected' : '' }}>
												({{ $destino->dep_inicio }}) {{ $destino->origen }} HASTA {{ $destino->destino }} ({{ $destino->dep_final }})
											</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								{!! Form::text('kilo5',null,['class'=>'form-control','id'=>'kilo5','value'=>'0']) !!}
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
											<option value="{{ $destino->id }}" {{ old('destino6', $destino->destino6 ) == $destino->id ? 'selected' : '' }}>
												({{ $destino->dep_inicio }}) {{ $destino->origen }} HASTA {{ $destino->destino }} ({{ $destino->dep_final }})
											</option>
										@endforeach
								</select>
		                    </div>
		                    <div class="col-md-3">
								{!! Form::text('kilo6',null,['class'=>'form-control','id'=>'kilo6','value'=>'0']) !!}
							</div>
							{!! $errors->first('destino6', '<span class="help-block">:message</span>') !!}
	                    </div>
		                <div class="form-group ">
		                    <label for="adicional" class="col-sm-2 control-label">Adicional:</label>
		                    <div class="col-sm-4 {{ $errors->has('adicional') ? 'has-error' : '' }}">
			                	<div class="input-group">

		                        	{!! Form::text('adicional',old('adicional'),['class'=>'form-control','id'=>'adicional','value'=>'0','onkeyup'=>'sumar();']) !!}
		                       		<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
		                        {!! $errors->first('adicional', '<span class="help-block">:message</span>') !!}
		                    </div>
		                    <label for="totalkm" class="col-sm-3 control-label">Total Km.:</label>
		                    <div class="col-md-3">
								<div class="input-group {{ $errors->has('totalkm') ? 'has-error' : '' }}">

		                        	{!! Form::text('totalkm',null,['class'=>'form-control','id'=>'totalkm',' value'=>'0','required','readonly'=>'readonly','pattern'=>'^[1-9]{10}']) !!}
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
	                	<center><label>DATOS OBLIGATORIOS</label></center>
		                <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
		                    <label for="tipo" class="col-sm-4 control-label">Tipo de Viaje:</label>
		                    <div class="col-sm-8">
		                    	<div class="input-group">
		                        	<input type="text" class="form-control" name="tipo" id="tipo" placeholder="Ejm. Viaje de Práctica" value="{{ old('tipo') }}">
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
									<select name="encargado"
			                    		class="form-control select2"
			                    		id="encargado">
										<option value="">Seleccione un Encargado</option>
											@foreach ($encargados as $encargado)
												<option value="{{ $encargado->id }}" {{ old('encargado', $encargado->encargado ) == $encargado->id ? 'selected' : '' }}>
													{{ $encargado->name }} 
												</option>
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
			                    	<select  class="form-control select2"
			                    			multiple="multiple"
			                    			name="conductor[]"
			                    			data-placeholder="Uno o dos encargados"
			                    			style="width: 100%;"
			                    			>
											@foreach ($conductores as $conductor)
												 <option {{ collect(old('conductor'))->contains($conductor->id) ? 'selected' : '' }} value="{{ $conductor->id }}">
												 	{{ $conductor->name }}
												 </option>
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
	                    <div class="form-group {{ $errors->has('vehiculo_id') ? 'has-error' : '' }}">
		                    <label for="vehiculo" class="col-sm-4 control-label">Vehículo:</label>
			                <div class="col-sm-8">
			                    <div class="input-group">
			                    	<select name="vehiculo_id"
			                    		class="form-control select2"
			                    		id="vehiculo_id">
										<option value="">Seleccione un Vehículo</option>
											@foreach ($vehiculos as $vehiculo)
												<option value="{{ $vehiculo->id }}" {{ old('vehiculo_id', $vehiculo->vehiculo_id ) == $vehiculo->id ? 'selected' : '' }}>
													{{ $vehiculo->tipo }} {{ $vehiculo->placa }} 
												</option>
											@endforeach
									</select>
									<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
			                    {!! $errors->first('vehiculo_id', '<span class="help-block">:message</span>') !!}
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
              	</div>
              	<li class="list-group-item list-group-item-info col-md-12">
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
		                	<div class="col-sm-2 {{ $errors->has('horainicial') ? 'has-error' : '' }}" >
				                <div class="bootstrap-timepicker">
					                <div class="form-group">
					                  <div class="input-group">
					                    <input type="text" class="form-control timepicker" name="horainicial">
					                    <div class="input-group-addon">
					                      <i class="fa fa-clock-o"></i>
					                    </div>
					                  </div>
					                  <!-- /.input group -->
					                </div>
					                <!-- /.form group -->
				                </div>
				                {!! $errors->first('horainicial', '<span class="help-block">:message</span>') !!}
				            </div>
		                    <label for="fecha_inicial" class="col-sm-1 control-label">Final:</label>
			                <div class="col-sm-3  {{ $errors->has('fecha_final') ? 'has-error' : '' }}">
			                    <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input name="fecha_final"
				                  		class="form-control"
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
				             <div class="col-sm-2 {{ $errors->has('horafinal') ? 'has-error' : '' }}" >
				                <div class="bootstrap-timepicker">
					                <div class="form-group">
					                  <div class="input-group">
					                    <input type="text" class="form-control timepicker" name="horafinal" id="horainicial">
					                    <div class="input-group-addon">
					                      <i class="fa fa-clock-o"></i>
					                    </div>
					                  </div>
					                  <!-- /.input group -->
					                </div>
					                <!-- /.form group -->
				                </div>
				                {!! $errors->first('horafinal', '<span class="help-block">:message</span>') !!}
				            </div>
		                </div>
	                </div>
	            	<center>
	              		<h3 class="box-title">
	              			<font color="#f39c12"><b>PRESUPUESTO DE VIAJE</b></font>
	          			</h3>
	          		</center>
		            <div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }} text-center alert-warning">
		                <label>VIAJE CONCIDERADO COMO:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                <label>
		                	Ciudad:
		                  <input type="radio" name="categoria" value="ciudad" {{ old('categoria') == 'ciudad' ? 'checked' : '' }} class="flat-red">
		                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                <label>
		                	Provincia:
		                  <input type="radio" name="categoria" value="provincia" {{ old('categoria') == 'provincia' ? 'checked' : '' }} class="flat-red">
		                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                <label>
		                	Frontera:
		                  <input type="radio" name="categoria" value="frontera" {{ old('categoria') == 'frontera' ? 'checked' : '' }} class="flat-red">
		                </label>
		                <b>{!! $errors->first('categoria', '<span class="help-block">:message</span>') !!}</b>
		  			</div>
	  			
              	<div class="box-body ">
              		
              		<center><label class="control-label">COMBUSTIBLE:</label></center>
              		<div class="form-group alert-warning">
          				<div class="{{ $errors->has('combustible') ? 'has-error' : '' }} ">
		                    <label for="combustible" class="col-sm-2 control-label">Diesel/Gasolina:</label>
		                    <div class="col-sm-2">
		                    	<div class="input-group">
		                        	{!! Form::text('combustible',null,['class'=>'form-control','id'=>'combustible','onkeyup'=>'sumar();','placeholder'=>'4/6/3.5']) !!}
		                        	<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
		                    	{!! $errors->first('combustible', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>

		                <div class="{{ $errors->has('totalcombu') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('totalcombu',old('totalcombu'),['class'=>'form-control','id'=>'totalcombu','value'=>'0','required','readonly']) !!}
		                       		<span class="input-group-addon">Litros</span>
                    			</div>
								{!! $errors->first('totalcombu', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('precio') ? 'has-error' : '' }}">
		                    <label for="precio" class="col-sm-1 control-label">Precio:</label>
		                    <div class="col-sm-2">
		                    	<div class="input-group">
		                        	{!! Form::text('precio',old('precio'),['class'=>'form-control','id'=>'precio','value'=>'0','onkeyup'=>'sumar();','placeholder'=>'3.72']) !!}
		                        	<span class="input-group-addon" id="basic-addon1">
				                    		<font color="red">
				      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
				      						</font>
			      					</span>
			                	</div>
		                    	{!! $errors->first('precio', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('totalprecio') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                    		{!! Form::text('totalprecio',old('totalprecio'),['class'=>'form-control','id'=>'totalprecio','value'=>'0','required','placeholder'=>'Total Bs.','readonly']) !!}
		                    		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('totalprecio', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
                    </div>
					<center><label for="viaticos">GASTOS</label></center>

                    <div class="form-group alert-warning">
	                    <div class="{{ $errors->has('canpeaje') ? 'has-error' : '' }}">
		                    <label for="canpeaje" class="col-sm-1 control-label">Peaje:</label>
		                    <div class="col-sm-1">
		                        {!! Form::text('canpeaje',old('canpeaje'),['class'=>'form-control','id'=>'canpeaje','value'=>'0','onkeyup'=>'sumar();','value'=>'old("canpeaje")','placeholder'=>'1']) !!}
		                    	{!! $errors->first('canpeaje', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('prepeaje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('prepeaje',old('prepeaje'),['class'=>'form-control','id'=>'prepeaje','value'=>'old("prepeaje")','onkeyup'=>'sumar();','placeholder'=>'100']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
								{!! $errors->first('prepeaje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totpeaje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('totpeaje',old('totpeaje'),['class'=>'form-control','id'=>'totpeaje','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
								{!! $errors->first('totpeaje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('cangaraje') ? 'has-error' : '' }}">
		                    <label for="cangaraje" class="col-sm-1 control-label">Garaje:</label>
		                    <div class="col-sm-1">
		                        {!! Form::text('cangaraje',old('cangaraje'),['class'=>'form-control','id'=>'cangaraje','value'=>'old("cangaraje")','onkeyup'=>'sumar();','placeholder'=>'1']) !!}
		                    	{!! $errors->first('cangaraje', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('pregaraje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('pregaraje',old('pregaraje'),['class'=>'form-control','id'=>'pregaraje','value'=>'old("pregaraje")','onkeyup'=>'sumar();','placeholder'=>'150']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('pregaraje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totgaraje') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('totgaraje',old('totgaraje'),['class'=>'form-control','id'=>'totgaraje','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('totgaraje', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="{{ $errors->has('nommante') ? 'has-error' : '' }}">
		                    <label for="nommante" class="col-sm-2 control-label">Mantenimiento/Nombre:</label>
		                    <div class="col-sm-4">
		                        <input type="text" class="form-control" name="nommante" placeholder="Parchado de llantas o mantenimiento" value="{{ old('nommante') }}">
		                    	{!! $errors->first('nommante', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('canmante') ? 'has-error' : '' }}">
		                	<label for="cangaraje" class="col-sm-1 control-label">Cant.:</label>
		                    <div class="col-md-1">
		                       	{!! Form::text('canmante',old('canmante'),['class'=>'form-control','id'=>'canmante','value'=>'old("canmante")','onkeyup'=>'sumar();','placeholder'=>'1']) !!}
		                       	{!! $errors->first('canmante', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('premante') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('premante',old('premante'),['class'=>'form-control','id'=>'premante','value'=>'old("premante")','onkeyup'=>'sumar();','placeholder'=>'110']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('premante', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="{{ $errors->has('totmante') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('totmante',old('totmante'),['class'=>'form-control','id'=>'totmante','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('totmante', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
					</div>
					<center><label for="viaticos">VIATICOS</label></center>
					<div class="form-group alert-warning">
						<div class="{{ $errors->has('canviaciu') ? 'has-error' : '' }}">
		                    <label for="canviaciu" class="col-sm-1 control-label">Ciudad:</label>
		                    <div class="col-sm-1">
		                        {!! Form::text('canviaciu',old('canviaciu'),['class'=>'form-control','id'=>'canviaciu','value'=>'old("canviaciu")','onkeyup'=>'sumar();','placeholder'=>'1']) !!}
		                    	{!! $errors->first('canviaciu', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('previaciu') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('previaciu',old('previaciu'),['class'=>'form-control','id'=>'previaciu','value'=>'old("previaciu")','onkeyup'=>'sumar();','placeholder'=>'150']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('previaciu', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totviaciu') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('totviaciu',old('totviaciu'),['class'=>'form-control','id'=>'totviaciu','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('totviaciu', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="{{ $errors->has('canviapro') ? 'has-error' : '' }}">
		                    <label for="canviapro" class="col-sm-1 control-label">Provincia:</label>
		                    <div class="col-sm-1">
		                        {!! Form::text('canviapro',old('canviapro'),['class'=>'form-control','id'=>'canviapro','value'=>'old("canviapro")','onkeyup'=>'sumar();','placeholder'=>'1']) !!}
		                    	{!! $errors->first('canviapro', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('previapro') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                       		{!! Form::text('previapro',old('previapro'),['class'=>'form-control','id'=>'previapro','value'=>'old("previapro")','onkeyup'=>'sumar();','placeholder'=>'150']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('previapro', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totviapro') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<div class='input-group date'>
		                       		{!! Form::text('totviapro',old('totviapro'),['class'=>'form-control','id'=>'totviapro','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('totviapro', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="{{ $errors->has('canviafro') ? 'has-error' : '' }}">
		                    <label for="canviafro" class="col-sm-1 control-label">Frontera:</label>
		                    <div class="col-sm-1">
		                        {!! Form::text('canviafro',old('canviafro'),['class'=>'form-control','id'=>'canviafro','value'=>'old("canviafro")','onkeyup'=>'sumar();','placeholder'=>'1']) !!}
		                    	{!! $errors->first('canviafro', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('previafro') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                    	<div class='input-group date'>
		                    		{!! Form::text('previafro',old('previafro'),['class'=>'form-control','id'=>'previafro','value'=>'old("previafro")','onkeyup'=>'sumar();','placeholder'=>'150']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('previafro', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totviafro') ? 'has-error' : '' }}">
		                    <div class="col-md-2">
		                       	<div class='input-group date'>
		                  			{!! Form::text('totviafro',old('totviafro'),['class'=>'form-control','id'=>'totviafro','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                       		<span class="input-group-addon">Bs.</span>
                    			</div>
		                       	{!! $errors->first('totviafro', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="{{ $errors->has('totprebol') ? 'has-error' : '' }}">
		                    <label for="totprebol" class="col-sm-3 control-label">Total Bs.(A):</label>
		                    <div class="col-sm-3">
		                    	<div class="input-group">
		                       		{!! Form::text('totprebol',old('totprebol'),['class'=>'form-control','id'=>'totprebol','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                       		<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
		                       	{!! $errors->first('totprebol', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
                    </div>
                    <center><label for="nota">OBJETIVO / NOTA</label></center>
                    <div class="form-group">
	                    <div class="{{ $errors->has('nota') ? 'has-error' : '' }}">
		                    <div class="col-sm-12">
		        				<div class="input-group">
		        					<input type="text" class="form-control" name="nota" placeholder="Ejm. Viaje de la carrera de Sistemas con sus propios recursos al congreso nacional de computación." value="{{ old('nota') }}">
		    	                    <span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
		        				</div>
		                    	<center>{!! $errors->first('nota', '<span class="help-block">:message</span>') !!}</center>
		                    </div>
		                </div>
		            </div>

		            <div class="form-group {{ $errors->has('recurso') ? 'has-error' : '' }} text-center alert-warning">
					    <label>
		                	Viaje con recursos de la U.A.T.F.
		                  <input type="radio" name="recurso" value="viajeuatf" {{ old('recurso') == 'viajeuatf' ? 'checked' : '' }}  class="flat-red" >
		                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                <label>
		                	Viaje con recursos de los estudiantes y/o encargados:
		                  <input type="radio" name="recurso" value="viajepropio" {{ old('recurso') == 'viajepropio' ? 'checked' : '' }}  class="flat-red" >
		                </label>
		                <strong>{!! $errors->first('recurso', '<span class="help-block">:message</span>') !!}</strong>
		            </div>
		            

		            <center><label for="publico">TRANSPORTE PÚBLICO</label></center>
		            <div class="form-group">
	                    <div class="{{ $errors->has('ruta1') ? 'has-error' : '' }}">
		                    <label for="ruta1" class="col-sm-1 control-label">Ruta:</label>
		                    <div class="col-sm-4">
		                        <input type="text" class="form-control" name="ruta1" placeholder="Ejm. Desde Potosí hasta Cochabamba" value="{{ old('ruta1') }}">
		                    	{!! $errors->first('ruta1', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('cantidad1') ? 'has-error' : '' }}">
		                    <label for="cantidad1" class="col-sm-1 control-label">Cantidad:</label>
		                    <div class="col-sm-1">
		                        {!! Form::text('cantidad1',old('cantidad1'),['class'=>'form-control','id'=>'cantidad1','value'=>'old("cantidad1")','onkeyup'=>'sumar();','placeholder'=>'37']) !!}
		                    	{!! $errors->first('cantidad1', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('precio1') ? 'has-error' : '' }}">
		                    <label for="precio1" class="col-sm-1 control-label">Precio:</label>
		                    <div class="col-sm-2">
		                        <div class='input-group date'>
		                        	{!! Form::text('precio1',old('precio1'),['class'=>'form-control','id'=>'precio1','value'=>'old("precio1")','onkeyup'=>'sumar();','placeholder'=>'80']) !!}
		                        	<span class="input-group-addon">Bs.</span>
                    			</div>
		                    	{!! $errors->first('precio1', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('total1') ? 'has-error' : '' }}">
		                    <div class="col-sm-2">
		                    	<div class='input-group date'>
		                  			{!! Form::text('total1',old('total1'),['class'=>'form-control','id'=>'total1','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                        	<span class="input-group-addon">Bs.</span>
                    			</div>
		                    	{!! $errors->first('total1', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		            </div>
		            <div class="form-group">
	                    <div class="{{ $errors->has('ruta2') ? 'has-error' : '' }}">
		                    <label for="ruta2" class="col-sm-1 control-label">Ruta:</label>
		                    <div class="col-sm-4">
		                        <input type="text" class="form-control" name="ruta2" placeholder="Ejm. Desde Potosí hasta Cochabamba" value="{{ old('ruta2') }}">
		                    	{!! $errors->first('ruta2', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('cantidad2') ? 'has-error' : '' }}">
		                    <label for="cantidad2" class="col-sm-1 control-label">Cantidad:</label>
		                    <div class="col-sm-1">
		                        {!! Form::text('cantidad2',old('cantidad2'),['class'=>'form-control','id'=>'cantidad2','value'=>'old("cantidad2")','onkeyup'=>'sumar();','placeholder'=>'37']) !!}
		                    	{!! $errors->first('cantidad2', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('precio2') ? 'has-error' : '' }}">
		                    <label for="precio2" class="col-sm-1 control-label">Precio:</label>
		                    <div class="col-sm-2">
		                    	<div class='input-group date'>
		                        	{!! Form::text('precio2',old('precio2'),['class'=>'form-control','id'=>'precio2','value'=>'old("precio2")','onkeyup'=>'sumar();','placeholder'=>'80']) !!}
		                        	<span class="input-group-addon">Bs.</span>
                    			</div>
		                    	{!! $errors->first('precio2', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('total2') ? 'has-error' : '' }}">
		                    <div class="col-sm-2">
		                    	<div class='input-group date'>
		                  			{!! Form::text('total2',old('total2'),['class'=>'form-control','id'=>'total2','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                        	<span class="input-group-addon">Bs.</span>
                    			</div>
		                    	{!! $errors->first('total2', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		            </div>
		            <div class="form-group">
	                    <div class="{{ $errors->has('ruta') ? 'has-error' : '' }}">
		                    <label for="ruta" class="col-sm-5 control-label">Flete del Camión General:</label>

		                </div>
		                <div class="{{ $errors->has('vueltas') ? 'has-error' : '' }}">
		                    <label for="vueltas" class="col-sm-1 control-label">Vueltas:</label>
		                    <div class="col-sm-1">
		                        {!! Form::text('vueltas',old('vueltas'),['class'=>'form-control','id'=>'vueltas','value'=>'old("vueltas")','onkeyup'=>'sumar();','placeholder'=>'2']) !!}
		                    	{!! $errors->first('vueltas', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('preciovuelta') ? 'has-error' : '' }}">
		                    <label for="preciovuelta" class="col-sm-1 control-label">Precio:</label>
		                    <div class="col-sm-2">
		                    	<div class='input-group date'>
		                        	{!! Form::text('preciovuelta',old('preciovuelta'),['class'=>'form-control','id'=>'preciovuelta','value'=>'old("preciovuelta")','onkeyup'=>'sumar();','placeholder'=>'250']) !!}
		                        	<span class="input-group-addon">Bs.</span>
                    			</div>
		                    	{!! $errors->first('preciovuelta', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('totalvuelta') ? 'has-error' : '' }}">
		                    <div class="col-sm-2">
		                    	<div class='input-group date'>
		                    		{!! Form::text('totalvuelta',old('totalvuelta'),['class'=>'form-control','id'=>'totalvuelta','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                        	<span class="input-group-addon">Bs.</span>
                    			</div>
		                    	{!! $errors->first('totalvuelta', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="{{ $errors->has('totalpublico') ? 'has-error' : '' }}">
		                    <label for="totalpublico" class="col-sm-3 control-label">Total transporte público (B):</label>
		                    <div class="col-sm-3">
		                    	<div class='input-group date'>
		                  			{!! Form::text('totalpublico',old('totalpublico'),['class'=>'form-control','id'=>'totalpublico','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                        	<span class="input-group-addon">Bs.</span>
                    			</div>
		                    	{!! $errors->first('totalpublico', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		                <div class="{{ $errors->has('totaldiferencia') ? 'has-error' : '' }}">
		                    <label for="totaldiferencia" class="col-sm-3 control-label">Total diferencia (A)-(B):</label>
		                    <div class="col-sm-3">
		                    	<div class='input-group date'>
		                        	{!! Form::text('totaldiferencia',old('totaldiferencia'),['class'=>'form-control','id'=>'totaldiferencia','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}
		                        	<span class="input-group-addon">Bs.</span>
                    			</div>
		                    	{!! $errors->first('totaldiferencia', '<span class="help-block">:message</span>') !!}
		                    </div>
		                </div>
		            </div>
		            </li>
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
  <link rel="stylesheet" href="/dashboard/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="/dashboard/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="/dashboard/plugins/iCheck/all.css">
@endpush

@push('scripts')
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
   <script src="/dashboard/plugins/datepicker/bootstrap-datepicker.js"></script>
   <script src="/dashboard/plugins/timepicker/bootstrap-timepicker.min.js"></script>
   <script src="/dashboard/plugins/iCheck/icheck.min.js"></script>
   <script src="/js/sistem/kilometraje.js"></script>
<script>
//Date picker
	$('.timepicker').timepicker({ 'scrollDefault': 'now' });

	$('#datepicker').datepicker({
	      autoclose: true,
	      todayHighlight:true,
	      format: 'yyyy-mm-dd',
	      clearBtn:true
	    });
	$('#datepickere').datepicker({
	      autoclose: true,
	      todayHighlight:true,
	      format: 'yyyy-mm-dd',
	      clearBtn:true
	    });

    $(".select2").select2({
    	language: "es",
    	maximumSelectionLength: 2,
    	allowClear: true
    });

    $("#destino1").select2({
    	placeholder: "Selecione un destino de ida",
    	language: "es",
    	maximumSelectionLength: 2,
    	allowClear: true
    });
    $("#destino2").select2({
    	placeholder: "Selecione un destino de vuelta",
    	language: "es",
    	maximumSelectionLength: 2,
    	allowClear: true
    });
    $("#destino3").select2({
    	placeholder: "Selecione un destino",
    	language: "es",
    	maximumSelectionLength: 2,
    	allowClear: true
    });
    $("#destino4").select2({
    	placeholder: "Selecione un destino",
    	language: "es",
    	maximumSelectionLength: 2,
    	allowClear: true
    });
    $("#destino5").select2({
    	placeholder: "Selecione un destino",
    	language: "es",
    	maximumSelectionLength: 2,
    	allowClear: true
    });
    $("#destino6").select2({
    	placeholder: "Selecione un destino",
    	language: "es",
    	maximumSelectionLength: 2,
    	allowClear: true
    });
    $("#vehiculo_id").select2({
    	placeholder: "Selecione un vehículo",
    	language: "es",
    	maximumSelectionLength: 2,
    	allowClear: true
    });
    $("#encargado").select2({
    	placeholder: "Selecione un encargado",
    	language: "es",
    	maximumSelectionLength: 2,
    	allowClear: true
    });
</script>
@endpush
