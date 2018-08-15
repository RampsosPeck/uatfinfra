<div class="modal fade" id="modalEstado{{ $general->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="login-box-body" >
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
        <h4 class="modal-title text-center"   style="color:yellow" id="modalEstado"><b>INSERTAR NOTA DE APROBACIÓN</b></h4>

      </div>
      <div class="contenedor">
      <form class="form-horizontal" method="POST" action="{{ route('servicios.store', '#createest') }}"  accept-charset="utf-8">
              {{ csrf_field() }}
      <div class="modal-body" > 
          <input type="hidden" name="idgeneral" value="{{ $general->id }}">
          <input type="hidden" name="estado" value="{{ "APROBADO" }}">
          <div class="form-group {{ $errors->has('comentario') ? 'has-error' : '' }}">
            <label for="message-text" class="col-md-4 control-label">Desea insertar alguna nota?:</label>
            <div class="col-md-8">
              
            {!! Form::textarea('comentario',old('comentario'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Insertar alguna NOTA sobre la aprobación del trabajo Ejm. El trabajo se realizará cuando se obtenga los materiales.']) !!}
              {!! $errors->first('comentario', '<span class="help-block">:message</span>') !!}
            
            </div>
          </div> <br><br><br>
      </div>
      <div class="modal-footer">
          <center> 
              <button class="btn btn-success"><b>Insertar Nota</b></button>
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
    $('#serviciosest').select2({
        dropdownParent: $('#modalEstado')
    });
</script>
@unless(request()->is('/generales'))
  <script>
    
    if(window.location.hash === '#createest')
    {
       $('#modalEstado').modal({ 'show' : {{ count($errors) > 0 ? true : false }}  });
    }

    $('#modalEstado').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });

    $('#modalEstado').on('show.bs.modal', function(){
       window.location.hash = '#createest';
    });

  </script>
@endunless

@endpush