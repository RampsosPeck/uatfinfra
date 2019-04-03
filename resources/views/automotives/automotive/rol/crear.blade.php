<div class="modal fade" id="modalPermi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="login-box-body" >
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
        <h4 class="modal-title text-center" style="color:yellow"  id="modalPermi"><b>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS <br> DEPTO. DE AUTOMOTORES</b></h4>
        <center><img class="img-circle" width="130" src="{!! URL::to('/img/conductor.png') !!} "></center>
        <h4 class="modal-title text-center"   style="color:yellow" id="modalPermi"><b>SOLICITUD DE PERMISO DE VIAJES</b></h4>

      </div>
      <?php 
        use Uatfinfra\ModelAutomotores\Tipo;
            $conductores = \DB::table('users')->where('type','Conductor')->where('position','AUTOMOTORES')->get();
            $tipos = Tipo::all();
       ?>
      <div class="contenedor">
      <form class="form-horizontal" method="POST" action="{{ route('roles.store', '#createper') }}"  accept-charset="utf-8">
              {{ csrf_field() }}
      <div class="modal-body" > 
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
              <label for="recipient-name" class="col-md-4 control-label">Conductor Solicitante:</label>
              <div class="col-md-8">
                <select  class="form-control select2"
                        name="user_id"
                        id="conductores" 
                        style="width: 100%;" 
                        value="{{old('user_id')}}">
                        <option value="">Seleccione al conductor</option>
                        @foreach ($conductores as $conductor)
                             <option {{ collect(old('conductor'))->contains($conductor->id) ? 'selected' : '' }} value="{{ $conductor->id }}">
                                {{ $conductor->name }}
                             </option>
                        @endforeach
                </select>
                {!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
              </div>
            </div>
            <input type="hidden" name="seccion" value="{{ "carpintería" }}">
          <div class="form-group {{ $errors->has('motivo') ? 'has-error' : '' }}">
            <label for="message-text" class="col-md-4 control-label">Motivo:</label>
            <div class="col-md-8">
              
            {!! Form::textarea('motivo',old('motivo'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Ingrese el motivo de permiso. Ejm. Personal u/o de algún otro tipo.']) !!}
              {!! $errors->first('motivo', '<span class="help-block">:message</span>') !!}
            
            </div>
          </div>
          <div class="form-group">
              <div class="{{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="message-text" class="col-md-1 control-label">Fecha:</label>
                <div class="col-md-4">
                {!! Form::date('fecha',old('fecha'),['class'=>'form-control','placeholder'=>'06-05-2018']) !!}
                  {!! $errors->first('fecha', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="{{ $errors->has('dias') ? 'has-error' : '' }}">
                <label for="message-text" class="col-md-1 control-label">Dias:</label>
                <div class="col-md-2">
                {!! Form::number('dias',old('dias'),['class'=>'form-control','placeholder'=>'2']) !!}
                  {!! $errors->first('dias', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="{{ $errors->has('tipo') ? 'has-error' : '' }}">
                <label for="message-text" class="col-md-1 control-label">Tipo:</label>
                <div class="col-md-3"> 
                    <select name="tipo" class="form-control select2" id="tipose" 
                        style="width: 100%;" 
                        value="{{old('tipo')}}">
                        <option value="">Permisos</option>
                        @foreach ($tipos as $tipo)
                            <option {{ collect(old('tipo'))->contains($tipo->id) ? 'selected' : '' }} value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('tipo', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
          <center>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
              <button class="btn btn-success"><b>Crear solicitud</b></button>
          </center>
      </div>

    </form>
    </div>
  </div>
</div>
</div>

@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
  <style>
    .contenedor{
            font-family: "Times New Roman", Times, serif;
        } 
  </style>
@endpush

@push('scripts') 
    <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
<script>
    $('#conductores').select2({
        dropdownParent: $('#modalPermi')
    });
    $('#tipose').select2({
        dropdownParent: $('#modalPermi')
    });
</script>
@unless(request()->is('/roles'))
  <script>

    if(window.location.hash === '#createper')
    {
       $('#modalPermi').modal({ 'show' : {{ count($errors) > 0 ? true : false }}  });
    }

    $('#modalPermi').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });

    $('#modalPermi').on('show.bs.modal', function(){
       window.location.hash = '#createper';
    });

  </script>
@endunless

@endpush



