@extends('automotives.layout')

@section('content')

<div class="container">
	<div class="col-md-11">
    <!-- Horizontal Form -->
        <div class="box box-success">
        	<font color="green"><span class="fa fa-user-circle-o fa-2x form-control-feedback"></span></font>
            <div class="box-header with-border">
              	<center>
              		<h3 class="box-title">
              			<font color="green"><b>NUEVO USUARIO</b></font>
          			</h3>
          		</center>
            </div>
            <!-- form start -->
            <form class="form-horizontal"  method="POST" action="{{ route('users.store') }}">
            	{{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                    <div class="col-md-7">
	                	<div class="form-group {{ $errors->has('entidad') ? 'has-error' : '' }}">
		                    <label for="entidad" class="col-sm-4 control-label">Entidad:</label>
			                <div class="col-sm-8">
			                    <input type="text" 
			                    		class="form-control" 
			                    		id="entidad" 
			                    		value="{{ old('entidad') }}"
			                    		name="entidad" 
			                    		placeholder="Entidad correspondiente. Ejm. Ing. de Sistemas">
			                    {!! $errors->first('entidad', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
	                	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		                    <label for="name" class="col-sm-4 control-label">Nombre completo:</label>
		                    <div class="col-sm-8">
		                        <input type="text" 
		                        		class="form-control" 
		                        		id="name"
		                        		value="{{ old('name') }}" 
		                        		name="name" 
		                        		placeholder="Nombre completo. Ejm. Ing. Jorge Peralta">
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
		                        <input type="text" 
		                        		class="form-control" 
		                        		id="cedula"
		                        		value="{{ old('cedula') }}" 
		                        		name="cedula" 
		                        		placeholder="Cédula de Identidad">
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
              		<div class="col-sm-3">
						<select name="type" class="form-control select2" data-placeholder="Tipo de Usuario" style="width: 100%;">
	                		<option value="">Tipo de usuario</option>
	                		
	                	</select>
	                </div>
	                <div class="col-sm-3">
						<select name="user_id" class="form-control select2" data-placeholder="Positions" style="width: 100%;">
	                		<option value="">Positions</option>
	                		
	                	</select>
	                </div>
                	<button type="submit" class="btn btn-success pull-right" data-toggle="tooltip" data-placement="left" title="Insertar al usuario al sistema">Guardar los datos</button>
              	</div>
              	<!-- /.box-footer -->
            </form>
		</div>
	</div>
</div>
@endsection


@push('styles')
  <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
@endpush

@push('scripts') 
   <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
<script>
//Date picker
    $(".select2").select2();
</script>
@endpush


