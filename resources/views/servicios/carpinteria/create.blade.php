
  
<form method="POST" action="{{ route('carpinterias.store', '#create') }}"  accept-charset="utf-8">
              {{ csrf_field() }}
<div class="contenedor">
<div class="modal fade" id="modalCarpin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" STYLE="background:#bce8f1">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="modalCarpin"><b>SOLICITUD DE TRABAJO PARA CARPINTERÍA</b></h4>
      </div>
      <div class="modal-body" >
            <div class="form-group {{ $errors->has('serv_id') ? 'has-error' : '' }}">
              <label for="recipient-name" class="control-label">Seleccione una Entidad:</label>
                <select name="serv_id" 
                  class="form-control select2" 
                  id="servicios"
                  style="width: 100%;"
                  value="{{old('serv_id')}}">
                  <option value="">Seleccione una entidad responsable</option>
                    @foreach ($solicitantes as $solicitante)
                      <option value="{{ $solicitante->id }}" {{ old('serv_id', $solicitante->serv_id ) == $solicitante->id ? 'selected' : '' }}> {{ $solicitante->solicitantes }} </option>
                    @endforeach
                </select>
                {!! $errors->first('serv_id', '<span class="help-block">:message</span>') !!}
            </div>
          <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Descripcion del trabajo que realizará:</label>
            {!! Form::textarea('descripcion',old('descripcion'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Ingrese el trabajo que realizara el taller de CARPINTERÍA, máximo 200 caracteres']) !!}
              {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
          </div>
          <div class="form-group {{ $errors->has('responsable') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Responsable (JEFE):</label>
            {!! Form::text('responsable',old('responsable'),['class'=>'form-control','placeholder'=>'Director de carrera o Jefe inmediato superior']) !!}
              {!! $errors->first('responsable', '<span class="help-block">:message</span>') !!}
          </div>
      </div>
      <div class="modal-footer">
          <center>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
              <button class="btn btn-primary"><b>Crear solicitud</b></button>
          </center>
      </div>
    </div>
  </div>
</div>
</div>
</form>

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
    $('#servicios').select2({
        dropdownParent: $('#modalCarpin')
    });
</script>
@unless(request()->is('/carpinterias'))
  <script>
    
    if(window.location.hash === '#create')
    {
       $('#modalCarpin').modal({ 'show' : {{ count($errors) > 0 ? true : false }}  });
    }

    $('#modalCarpin').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });

    $('#modalCarpin').on('show.bs.modal', function(){
       window.location.hash = '#create';
    });

  </script>
@endunless

@endpush