@extends('automotives.layout')

@section('content')

<div class="container">
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
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
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="row">
                    <div class="col-md-7">
                    	<div class="form-group">
		                    <label for="name" class="col-sm-4 control-label">Nombre completo:</label>
		                    <div class="col-sm-8">
		                        <input type="name" class="form-control" id="name" placeholder="Nombre completo. Ing. Jorge Peralta">
		                    </div>
	                    </div>
		                <div class="form-group">
		                    <label for="entidad" class="col-sm-4 control-label">Entidad:</label>
			                <div class="col-sm-8">
			                    <input type="entidad" class="form-control" id="entidad" placeholder="Entidad correspondiente. Ejm. Ing. de Sistemas">
			                </div>
		                </div>
	                	<div class="form-group">
		                    <label for="email" class="col-sm-4 control-label">Correo Electrónico:</label>
			                <div class="col-sm-8">
			                    <input type="email" class="form-control" id="email" placeholder="Su correo electrónico. Ejm. jorge@gmail.com">
			                </div>
		                </div>
                    </div>
                    <div class="col-md-5">
                    	<div class="form-group">
		                    <label for="cedula" class="col-sm-3 control-label">Cédula:</label>
		                    <div class="col-sm-9">
		                        <input type="text" class="form-control" id="cedula" placeholder="Cédula de Identidad">
		                    </div>
	                    </div>
		                <div class="form-group">
		                    <label for="celular" class="col-sm-3 control-label">Celular:</label>
			                <div class="col-sm-9">
			                    <input type="number" class="form-control" id="celular" placeholder="Su número de celular">
			                </div>
		                </div>
	                	<div class="form-group">
		                    <label for="password" class="col-sm-3 control-label">Clave:</label>
			                <div class="col-sm-9">
			                    <input type="password" class="form-control" id="password" placeholder="Su clave o contraseña">
			                </div>
		                </div>
                    </div>
                	</div>
              	</div>
              	<!-- /.box-body -->
              	<div class="box-footer">
                	<button type="submit" class="btn btn-warning">Sign in</button>

                	<button type="submit" class="btn btn-info">Sign in</button>
                	<button type="submit" class="btn btn-success pull-right">Sign in</button>
              	</div>
              	<!-- /.box-footer -->
            </form>
		</div>
	</div>
</div>
@endsection





