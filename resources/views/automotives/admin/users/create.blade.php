@extends('automotives.layout')

@section('content')

<div class="container">
	<div class="col-md-11">
    <!-- Horizontal Form -->
        <div class="box box-info">
        	<font color="#00c0ef"><span class="fa fa-user-circle-o fa-2x form-control-feedback"></span></font>
            <div class="box-header with-border">
              	<center>
              		<h3 class="box-title">
              			<font color="#00c0ef"><b>NUEVO USUARIO</b></font>
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
            {!! Form::open(['route'=>'users.store','method'=>'POST','class'=>'form-horizontal']) !!}
            	{{ csrf_field() }}
                <div class="box-body alert-info">
                    <div class="row">
                    <div class="col-md-7">
	                	<div class="form-group {{ $errors->has('entidad') ? 'has-error' : '' }}">
		                    <label for="entidad" class="col-sm-4 control-label">Entidad:</label>
		                    
			                <div class="col-sm-8">
			                    <div class="input-group">
			                   		<input type="text" 
			                    		class="form-control" 
			                    		id="entidad" 
			                    		value="{{ old('entidad') }}"
			                    		name="entidad" 
			                    		placeholder="Entidad correspondiente. Ejm. Ing. de Sistemas" >
			                    		<span class="input-group-addon" id="basic-addon1"><font color="red">
			                    			<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i></font></span>

			                    </div>
			                    {!! $errors->first('entidad', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
	                	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		                    <label for="name" class="col-sm-4 control-label">Nombre completo:</label>
		                    <div class="col-sm-8">
		                    	<div class="input-group">
		                       		<input type="text" 
		                        		class="form-control" 
		                        		id="name"
		                        		value="{{ old('name') }}" 
		                        		name="name" 
		                        		placeholder="Nombre completo. Ejm. Ing. Jorge Peralta"
		                        		>
		                        		<span class="input-group-addon" id="basic-addon1"><font color="red">
			                    			<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i></font></span>
		                        </div>
		                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
	                	<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		                    <label for="email" class="col-sm-4 control-label">Correo Electrónico:</label>
			                <div class="col-sm-8">
			                    <input type="email" 
			                    		class="form-control" 
			                    		id="email"
			                    		value="{{ old('email') }}" 
			                    		name="email" 
			                    		placeholder="Su correo electrónico. Ejm. jorge@gmail.com">
			                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
                    </div>
                    <div class="col-md-5">
                    	<div class="form-group {{ $errors->has('cedula') ? 'has-error' : '' }}">
		                    <label for="cedula" class="col-sm-3 control-label">Cédula:</label>
		                    <div class="col-sm-9">
		                    	<div class="input-group">
		                        <input type="text" 
		                        		class="form-control" 
		                        		id="cedula"
		                        		value="{{ old('cedula') }}" 
		                        		name="cedula" 
		                        		placeholder="Cédula de Identidad">
		                        		<span class="input-group-addon" id="basic-addon1"><font color="red">
			                    			<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i></font></span>
		                    	</div>
		                      	{!! $errors->first('cedula', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
		                <div class="form-group {{ $errors->has('celular') ? 'has-error' : '' }}">
		                    <label for="celular" class="col-sm-3 control-label">Celular:</label>
			                <div class="col-sm-9">
			                    <input type="number" 
			                    		class="form-control" 
			                    		id="celular" 
			                    		value="{{ old('celular') }}"
			                    		name="celular" 
			                    		placeholder="Su número de celular">
			                    {!! $errors->first('celular', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
	                	<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
		                    <label for="password" class="col-sm-3 control-label">Clave:</label>
			                <div class="col-sm-9">
			                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su clave o contraseña">
			                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
                    </div>
                	</div>
              	</div>
              	<!-- /.box-body -->
              	<div class="box-footer">

              	@if (Auth::user()->type == "Administrator" && Auth::user()->position == "WEB SITE")
              		<div class="col-sm-3 {{ $errors->has('type') ? 'has-error' : '' }}">
	                	{!! Form::select('type', config('tipo.type'), null, ['class' => 'form-control  select2','placeholder'=>'Types Users','style'=>'width: 100%;']) !!}
	                	{!! $errors->first('type', '<span class="help-block">:message</span>') !!}
	                </div>
	                <div class="col-sm-3 {{ $errors->has('position') ? 'has-error' : '' }}">
	                	{!! Form::select('position', config('tipo.position'), null, ['class' => 'form-control  select2','placeholder'=>'Positions Users','style'=>'width: 100%;']) !!}
	                	{!! $errors->first('position', '<span class="help-block">:message</span>') !!}
	                </div>
	            @else
		            <div class="col-sm-3">
						<input type="hidden" name="type" value="Enc. de Viaje">
					</div>
		                <div class="col-sm-3">
						<input type="hidden" name="position" value="U.A.T.F.">	
					</div>
	            @endif
		            <div class="col-sm-3 {{ $errors->has('active') ? 'has-error' : '' }}">
	                	{!! Form::select('active', config('tipo.active'), null, ['class' => 'form-control  select2','placeholder'=>'Permisos','style'=>'width: 100%;']) !!}
	                	{!! $errors->first('active', '<span class="help-block">:message</span>') !!}
	                </div>
	                <div class="col-sm-3">
                		<button type="submit" class="btn btn-primary pull-left btn-block" data-toggle="tooltip" data-placement="left" title="Insertar al usuario al sistema">Guardar los datos</button>
                	</div>
              	</div>
              	<!-- /.box-footer -->
            {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection


@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
@endpush

@push('scripts') 
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
<script>
//Date picker
    $(".select2").select2();
</script>
@endpush


