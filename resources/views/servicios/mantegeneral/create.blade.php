<div class="modal fade" id="modalMante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="login-box-body">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title text-center" style="color:yellow"  id="modalMante"><b>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS <br> SERVICIOS GENERALES</b></h4>
        <center><img class="img-circle" width="110" src="{!! URL::to('/img/equipos.png') !!} "></center>
        <h4 class="modal-title text-center" style="color:yellow" id="modalMante"><b>SOLICITUD DE TRABAJO PARA MANTENIMIENTO GENERAL</b></h4>
      </div>
      
      <div class="contenedor">
      <form class="form-horizontal" method="POST" action="{{ route('generales.store', '#createman') }}"  accept-charset="utf-8">
              {{ csrf_field() }}
      <div class="modal-body" >
            <div class="form-group {{ $errors->has('serv_id') ? 'has-error' : '' }}">
              <label for="recipient-name" class="col-md-4 control-label">Unidad Solicitante:</label>
              <div class="col-md-8">
                <select name="serv_id" 
                  class="form-control select2" 
                  id="solicitamante"
                  style="width: 100%;"
                  value="{{old('serv_id')}}">
                  <option value="">Seleccione la entidad solicitante</option>
                    @foreach ($solicitantes as $solicitante)
                      <option value="{{ $solicitante->id }}" {{ old('serv_id', $solicitante->serv_id ) == $solicitante->id ? 'selected' : '' }}> {{ $solicitante->solicitantes }} </option>
                    @endforeach
                </select>
                {!! $errors->first('serv_id', '<span class="help-block">:message</span>') !!}
              </div>
            </div>
            <input type="hidden" name="seccion" value="{{ "mant._general" }}">
          
          <div class="form-group">
            <label for="message-text" class="col-md-1 control-label">Equipo:</label>
            <div class="col-md-3">
            {!! Form::text('equipo',old('equipo'),['class'=>'form-control','placeholder'=>'Ejm.']) !!}
            </div>
            <label for="message-text" class="col-md-1 control-label">Marca:</label>
            <div class="col-md-3">
            {!! Form::text('marca',old('marca'),['class'=>'form-control','placeholder'=>'Ejm.']) !!}
            </div>
            <label for="message-text" class="col-md-1 control-label">Modelo:</label>
            <div class="col-md-3">
            {!! Form::text('modelo',old('modelo'),['class'=>'form-control','placeholder'=>'Ejm.']) !!}
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-md-1 control-label">Código:</label>
            <div class="col-md-3">
            {!! Form::text('codigo',old('codigo'),['class'=>'form-control','placeholder'=>'Ejm.']) !!}
            </div>
            <label for="message-text" class="col-md-1 control-label">#Serie:</label>
            <div class="col-md-3">
            {!! Form::text('serie',old('serie'),['class'=>'form-control','placeholder'=>'Ejm.']) !!}
            </div>
            <label for="message-text" class="col-md-1 control-label">Otros:</label>
            <div class="col-md-3">
            {!! Form::text('otros',old('otros'),['class'=>'form-control','placeholder'=>'Ejm.']) !!}
            </div>
          </div>

          <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
            <label for="message-text" class="col-md-4 control-label">Descripcion del trabajo que realizará:</label>
            <div class="col-md-8">
            {!! Form::textarea('descripcion',old('descripcion'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Ingrese el trabajo que realizara el taller de MANTENIMIENTO GENERAL, máximo 200 caracteres']) !!}
              {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
            </div>
          </div>
          <div class="form-group {{ $errors->has('responsable') ? 'has-error' : '' }}">
            <label for="message-text" class="col-md-4 control-label">Responsable (JEFE):</label>
            <div class="col-md-8">
              {!! Form::text('responsable',old('responsable'),['class'=>'form-control','placeholder'=>'Director de carrera o Jefe inmediato superior']) !!}
              {!! $errors->first('responsable', '<span class="help-block">:message</span>') !!}
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
    $('#solicitamante').select2({
        dropdownParent: $('#modalMante')
    });
</script>
@unless(request()->is('/servicios'))
  <script>
    
    if(window.location.hash === '#createman')
    {
       $('#modalMante').modal({ 'show' : {{ count($errors) > 0 ? true : false }}  });
    }

    $('#modalMante').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });

    $('#modalMante').on('show.bs.modal', function(){
       window.location.hash = '#createman';
    });

  </script>
@endunless 
@endpush