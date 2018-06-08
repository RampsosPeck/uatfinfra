<div class="modal fade" id="modalElec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="login-box-body">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title text-center" style="color:yellow"  id="modalElec"><b>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS <br> SERVICIOS GENERALES</b></h4>
        <center><img class="img-circle" width="110" src="{!! URL::to('/img/electrico.jpg') !!} "></center>
        <h4 class="modal-title text-center" style="color:yellow" id="modalElec"><b>SOLICITUD DE TRABAJO PARA LA SECC. ELECTRICIDAD</b></h4>
      </div>
      
      <div class="contenedor">
      <form class="form-horizontal" method="POST" action="{{ route('generales.store', '#createlec') }}"  accept-charset="utf-8">
              {{ csrf_field() }}
      <div class="modal-body" >
            <div class="form-group {{ $errors->has('serv_id') ? 'has-error' : '' }}">
              <label for="recipient-name" class="col-md-4 control-label">Unidad Solicitante:</label>
              <div class="col-md-8">
                <select name="serv_id" 
                  class="form-control select2" 
                  id="solicitanteselec"
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
            <input type="hidden" name="seccion" value="{{ "eléctrico" }}">
          <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
            <label for="message-text" class="col-md-4 control-label">Descripcion del trabajo que realizará:</label>
            <div class="col-md-8">
            {!! Form::textarea('descripcion',old('descripcion'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Ingrese el trabajo que realizara el taller de ELECTRICIDAD, máximo 200 caracteres']) !!}
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
    $('#solicitanteselec').select2({
        dropdownParent: $('#modalElec')
    });
</script>
@unless(request()->is('/servicios'))
  <script>
    
    if(window.location.hash === '#createlec')
    {
       $('#modalElec').modal({ 'show' : {{ count($errors) > 0 ? true : false }}  });
    }

    $('#modalElec').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });

    $('#modalElec').on('show.bs.modal', function(){
       window.location.hash = '#createlec';
    });

  </script>
@endunless 
@endpush