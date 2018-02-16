
<form method="POST" action="{{ route('reservas.store', '#create') }}"  accept-charset="utf-8">
              {{ csrf_field() }}
<div class="modal fade" id="myModalreserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="exampleModalLabel"><b>INGRESE LOS SIGUENTES DATOS</b></h4>
      </div>
      <div class="modal-body" STYLE="background:#bce8f1">
			<div class="form-group {{ $errors->has('startdate') ? 'has-error' : '' }}">
                <label for="startdate" class="col-sm-3 control-label">Fecha Inicial:</label>
                <div class="input-group date">
                  <input name="startdate" value="{{old('startdate')}}" type="text" class="form-control pull-right" id="datepicker1">
                  		<div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                </div>
                </div>
                {!! $errors->first('startdate', '<span class="help-block">:message</span>') !!}
            </div>
        	<div class="form-group {{ $errors->has('enddate') ? 'has-error' : '' }}">
                <label for="enddate" class="col-sm-3 control-label">Fecha Final:</label>
                <div class="input-group date">
                    <input name="enddate" value="{{old('enddate')}}" type="text" class="form-control pull-right" id="datepicker2">
                  		<div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                </div>
                </div>
                {!! $errors->first('enddate', '<span class="help-block">:message</span>') !!}
            </div>
            @if (Auth::user()->type == "Jefatura" OR Auth::user()->type == "Supervisor" OR Auth::user()->type == "Administrator")
            	<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                	<label for="user_id" class="col-sm-3 control-label">Encargado:</label>
                	<div class="col-md-9 input-group">	
                			<select name="user_id" class="form-control select2" data-placeholder="Seleccione un encargado" style="width: 100%;">
                			<option value="">Seleccione un encargado</option>
                			@foreach ($users as $user)
                				<option value="{{ $user->id }}" {{ old('user_id', $user->user_id ) == $user->id ? 'selected' : '' }}> {{ $user->name }}</option>
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
               	<div class="col-md-9 input-group">	
                    <input type="text" class="form-control" name="entity" value="{{old('entity')}}" id="entity" placeholder="Ejm. Carrera de Ing. de Sistemas">
                </div>
                {!! $errors->first('entity', '<span class="help-block">:message</span>') !!}
            </div>
        	<div class="form-group {{ $errors->has('objetive') ? 'has-error' : '' }}">
                <label for="objetive" class="col-sm-3 control-label">Objetivo:</label>
                <div class="col-md-9 input-group">	
                    <input type="text" name="objetive" class="form-control" id="objetive" value="{{old('objetive')}}" placeholder="Ejm. Viaje de Práctica">
                </div>	
                {!! $errors->first('objetive', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group {{ $errors->has('passengers') ? 'has-error' : '' }}">
                <label for="passengers" class="col-sm-3	control-label">Pasajeros:</label>
                <div class="col-md-9 input-group">		
                    <input type="number" class="form-control" id="passengers" name="passengers" value="{{old('passengers')}}" placeholder="Ejm. 37">
                </div>	
                {!! $errors->first('passengers', '<span class="help-block">:message</span>') !!}
            </div>

      </div>
      <div class="modal-footer ">
            <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>

                <button type="submit" class="btn btn-success">Guardar los datos</button>
              
            </center>
        </div>
    </div>
  </div>
</div>

</form>


@push('styles')

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
@unless(request()->is('reservas*'))
  <script>
    
    if(window.location.hash === '#create')
    {
      $('#myModalreserva').modal('show');
    }

    $('#myModalreserva').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });

    $('#myModalreserva').on('shown.bs.modal', function(){
       window.location.hash = '#create';
    });

  </script>
@endunless
@endpush







 