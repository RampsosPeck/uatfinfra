{!! Form::open(['route'=>'solicitudes.store','method'=>'POST']) !!}
              {{ csrf_field() }}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="exampleModalLabel"><b>INGRESE LOS SIGUENTES DATOS</b></h4>
      </div>
      <div class="modal-body" STYLE="background:#bce8f1">
        
          <div class="form-group {{ $errors->has('vehiculo') ? 'has-error' : '' }}">
              <label for="recipient-name" class="control-label">Vehículo:</label>
                <select name="vehiculo_id" 
                  class="form-control select2" 
                  id="vehiculo"
                  style="width: 100%;"
                  required="required">
                  <option value="">Seleccione un Vehículo</option>
                    @foreach ($vehiculos as $vehiculo)
                      <option value="{{ $vehiculo->id }}">{{ $vehiculo->tipo }} {{ $vehiculo->placa }} </option>
                    @endforeach
                </select>
                {!! $errors->first('vehiculo', '<span class="help-block">:message</span>') !!}
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Descripcion del trabajo a realizar:</label>
            {!! Form::textarea('descripcion',old('descripcion'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Ingrese el trabajo que realizara el mecánico','required']) !!}
                      {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
          </div>
        
      </div>
      <div class="modal-footer ">
            <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
                <button class="btn btn-primary"><b>Crear solicitud</b></button>
            </center>
        </div>
    </div>
  </div>
</div>
{{ FORM::close() }}



@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">

@endpush

@push('scripts') 
    <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
<script>

    $("#vehiculo").select2({
        placeholder: "Selecione un vehículo",
        language: "es",
        maximumSelectionLength: 2,
        allowClear: true
    });
  </script>
    
@endpush