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
        <div class="box box-primary">
        	<font color="#007bff"><span class="fa fa-bus fa-2x form-control-feedback"></span></font>
            <div class="box-header with-border">
              	<center>
              		<h3 class="box-title">
              			<font color="#007bff"><b>INSERTAR A UN NUEVO VEHÍCULO</b></font>
          			</h3>
          		</center>
            </div>
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                	<div class="col-md-3">
	                	<div class="form-group">
		                    <label for="modelo" class="col-sm-4 control-label">Modelo:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="modelo" placeholder="Ejm. 2008">
			                </div>
		                </div>
		                <div class="form-group">
		                    <label for="brand" class="col-sm-4 control-label">Marca:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="brand" placeholder="Ejm. Toyota">
			                </div>
		                </div>
	                    
                    	<div class="form-group">
		                    <label for="placa" class="col-sm-4 control-label">Placa:</label>
		                    <div class="col-sm-8">
		                        <input type="placa" class="form-control" id="placa" placeholder="Ejm. 1325 RKU">
		                    </div>
	                    </div>
		                <div class="form-group">
		                    <label for="tipo" class="col-sm-4 control-label">Tipo:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="tipo" placeholder="Ejm. Vagoneta">
			                </div>
		                </div>
                    </div>
                    <div class="col-md-4">
                    	<div class="form-group">
		                    <label for="mileage" class="col-sm-4 control-label">Kilometraje:</label>
		                    <div class="col-sm-8">
		                        <input type="text" class="form-control" id="mileage" placeholder="Ejm. 1562">
		                    </div>
	                    </div>
	                	<div class="form-group">
		                    <label for="cilindrada" class="col-sm-4 control-label">Cilindrada:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="cilindrada" placeholder="Ejm. 10305">
			                </div>
		                </div>
		                <div class="form-group">
		                    <label for="chassis" class="col-sm-4 control-label">Chasis:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="chassis" placeholder="Ejm. AMDIJCUE12">
			                </div>
		                </div>
	                	<div class="form-group">
		                    <label for="motor" class="col-sm-4 control-label">Motor:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="motor" placeholder="Ejm. MSDUFN125112">
			                </div>
		                </div>
                    </div>
            		<div class="col-md-5">
                    	<div class="form-group">
		                    <label for="especification" class="col-sm-4 control-label">M. Específico:</label>
		                    <div class="col-sm-8">
		                        <input type="text" class="form-control" id="especification" placeholder="Ejm. Land Cruzer">
		                    </div>
	                    </div>
	                	<div class="form-group">
		                    <label for="oil" class="col-sm-4 control-label">Combustible:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="oil" placeholder="Ejm. Diesel">
			                </div>
		                </div>
	                	<div class="form-group">
		                    <label for="user_id" class="col-sm-4 control-label">Asignado A:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="user_id" placeholder="Ejm. Valerio Condori">
			                </div>
		                </div>
		                <div class="form-group">
		                    <label for="estado" class="col-sm-4 control-label">Estado:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="estado" placeholder="Ejm. Óptimo">
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
            </form>
		</div>
	</div>
</div>
@endsection





