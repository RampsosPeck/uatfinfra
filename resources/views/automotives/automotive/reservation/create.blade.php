
<form method="POST" action="{{ route('reservas.store', '#create') }}"  accept-charset="utf-8">
              {{ csrf_field() }}
<div class="modal fade" id="myModalreserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="login-box-body">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="exampleModalLabel" style="color:yellow"><b>RESERVA DE VIAJE</b></h4>
        <center><img class="img-circle" width="120" src="{!! URL::to('/img/permiconduc.png') !!} "></center>
        <h4 class="modal-title text-center" id="exampleModalLabel" style="color:yellow"><b>INGRESE LOS SIGUENTES DATOS</b></h4>
      </div>
      <div class="modal-body" >
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

            <div class="form-group {{ $errors->has('objetive') ? 'has-error' : '' }}">
                <label for="objetive" class="col-sm-3 control-label">Objetivo y Lugar:</label>
                <div class="col-md-9 input-group">   
                    {!! Form::textarea('objetive',old('objetive'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Indique el objetivo y los lugares de práctica. Maximo 200 caracteres.']) !!}
                    {!! $errors->first('objetive', '<span class="help-block">:message</span>') !!}
                </div>   
            </div>

            <div class="form-group">
                <label for="startdate" class="col-md-2 control-label">Desde:</label>
                <div class="col-md-4 {{ $errors->has('startdate') ? 'has-error' : '' }}">
                  {!! Form::date('startdate',old('startdate'),['class'=>'form-control']) !!}
                {!! $errors->first('startdate', '<span class="help-block">:message</span>') !!}
                </div>
                <label for="enddate" class="col-md-2 control-label">Hasta:</label>
                <div class="col-md-4 {{ $errors->has('enddate') ? 'has-error' : '' }}">
                  {!! Form::date('enddate',old('marca'),['class'=>'form-control']) !!}
                  {!! $errors->first('enddate', '<span class="help-block">:message</span>') !!}
                </div> 
            </div>
             <br /> <br />
            <div class="form-group">
                <label for="passengers" class="col-sm-2 control-label">Pasajeros:</label>
                <div class="col-md-3 {{ $errors->has('passengers') ? 'has-error' : '' }}">     
                      {!! Form::number('passengers',old('passengers'),['class'=>'form-control','placeholder'=>'37' ]) !!}
                      {!! $errors->first('passengers', '<span class="help-block">:message</span>') !!}
                </div>
                <label for="entity" class=" col-sm-2 control-label">Entidad: </label>
                <div class="col-md-5 {{ $errors->has('entity') ? 'has-error' : '' }}">   
                      {!! Form::text('entity',old('entity'),['class'=>'form-control','placeholder'=>'Ejm. Carrera de Ing. de Sistemas' ]) !!}
                      {!! $errors->first('entity', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <br />  
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
 
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">

@endpush

@push('scripts')
<!-- bootstrap datepicker -->  
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
<script>
//Date picker
    
    $(".select2").select2();
</script>
@unless(request()->is('/reservas*'))
  <script>
    
    if(window.location.hash === '#create')
    {
      $('#myModalreserva').modal({ 'show' : {{ count($errors) > 0 ? true : false }}  });
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







 