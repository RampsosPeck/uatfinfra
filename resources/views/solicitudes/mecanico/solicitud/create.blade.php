<form method="POST" action="{{ route('solicitudes.store', '#create') }}"  accept-charset="utf-8">
              {{ csrf_field() }}

<div class="modal fade" id="modalSolMe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="login-box-body">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="exampleModalLabel" style="color:yellow"><b>SOLICITUD DE TRABAJO</b></h4>
        <center><img class="img-circle" width="120" src="{!! URL::to('/img/mecadie.png') !!} "></center>
        <h4 class="modal-title text-center" id="exampleModalLabel" style="color:yellow"><b>MECÁNICO DE  MOVILIDADES U.A.T.F.</b></h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group {{ $errors->has('vehiculo_id') ? 'has-error' : '' }}">
              <label for="recipient-name" class="control-label" style="color:yellow">Vehículo:</label>
                <select name="vehiculo_id" 
                  class="form-control select2" 
                  id="vehiculo"
                  style="width: 100%;"
                  value="{{old('vehiculo_id')}}">
                  <option value="">Seleccione un Vehículo</option>
                    @foreach ($vehiculos as $vehiculo)
                      <option value="{{ $vehiculo->id }}" {{ old('vehiculo_id', $vehiculo->vehiculo_id ) == $vehiculo->id ? 'selected' : '' }}> {{ $vehiculo->tipo }} {{ $vehiculo->placa }} </option>
                    @endforeach
                </select>
                {!! $errors->first('vehiculo_id', '<span class="help-block">:message</span>') !!}
          </div>
          <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label" style="color:yellow">Descripcion del trabajo a realizar:</label>
            {!! Form::textarea('descripcion',old('descripcion'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Ingrese el trabajo que realizara el mecánico, máximo 200 caracteres']) !!}
              {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
          </div>
        
      </div>
      <div class="modal-footer ">
            <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
                <button class="btn btn-success"><b>Crear solicitud</b></button>
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
    <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
<script>
    $('#vehiculo').select2({
        dropdownParent: $('#modalSolMe')
    });
  </script>
@unless(request()->is('/solicitudes'))
  <script>
    
    if(window.location.hash === '#create')
    {
       $('#modalSolMe').modal({ 'show' : {{ count($errors) > 0 ? true : false }}  });
    }

    $('#modalSolMe').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });

    $('#modalSolMe').on('show.bs.modal', function(){
       window.location.hash = '#create';
    });

  </script>
@endunless

@endpush