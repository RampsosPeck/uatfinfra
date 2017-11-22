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
        	<font color="#007bff"><span class="fa fa-check-square-o fa-2x form-control-feedback"></span></font>
            <div class="box-header with-border">
              	<center>
              		<h3 class="box-title">
              			<font color="#007bff"><b>CREAR UNA NUEVA RESERVA</b></font>
          			</h3>
          		</center>
            </div>
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('reservas.store') }}" >
            	{{ csrf_field() }}
                <div class="box-body alert-info">
                	<div class="col-md-6">
		                <div class="form-group">
		                    <label for="startdate" class="col-sm-4 control-label">Fecha Inicial:</label>
			                <div class="col-sm-8">
			                     <div class="input-group date">
				                  <input name="startdate" type="text" class="form-control pull-right" id="datepicker1">
				                  		<div class="input-group-addon">
						                    <i class="fa fa-calendar"></i>
						                </div>
				                </div>
			                </div>
		                </div>
                    	<div class="form-group">
		                    <label for="enddate" class="col-sm-4 control-label">Fecha Final:</label>
		                    <div class="col-sm-8">
		                        <div class="input-group date">
				                  <input name="enddate" type="text" class="form-control pull-right" id="datepicker2">
				                  		<div class="input-group-addon">
						                    <i class="fa fa-calendar"></i>
						                </div>
				                </div>
		                    </div>
	                    </div>
	                    <div class="form-group">
		                    <label for="user_id" class="col-sm-4 control-label">Encargado:</label>
			                <div class="col-sm-8">
			                	<select name="user_id" class="form-control select2" data-placeholder="Seleccione un encargado" style="width: 100%;">
			                		<option value="">Seleccione un encargado</option>
			                		@foreach ($users as $user)
			                			<option value="{{ $user->id }}">{{ $user->name }}</option>
			                		@endforeach
			                	</select>
			                </div>
		                </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="form-group">
		                    <label for="entity" class="col-sm-4 control-label">Entidad: </label>
		                    <div class="col-sm-8">
		                        <input type="text" class="form-control" name="entity" id="entity" placeholder="Ejm. Carrera de Ing. de Sistemas">
		                    </div>
	                    </div>
	                	<div class="form-group">
		                    <label for="objective" class="col-sm-4 control-label">Objetivo:</label>
			                <div class="col-sm-8">
			                    <input type="text" name="objective" class="form-control" id="objective" placeholder="Ejm. Viaje de Práctica">
			                </div>
		                </div>
		                <div class="form-group">
		                    <label for="passengers" class="col-sm-4 control-label">Pasajeros:</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" id="passengers" name="passengers" placeholder="Ejm. 37">
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

@push('styles')
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/dashboard/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
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


 