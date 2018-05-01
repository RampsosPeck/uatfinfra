@extends('automotives.layout') 

@section('content')

<div class="container">
<br><br><br><br>
<div class="col-md-3">
</div>
<div class="col-md-6">
    <div class="box box-info">
        <div class="box-header with-border">
          <CENTER><h3 class="box-title"><b>EDITAR SOLICITUD PARA EL {{ mb_strtoupper($general->seccion,'UTF-8') }}</b></h3></CENTER>
        </div>
        <div class="box-body" STYLE="background:#bce8f1" >
      {!! Form::model($general,['route'=>['generales.update',$general->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
              {{ csrf_field() }}
            
            <div class="{{ $errors->has('serv_id') ? 'has-error' : '' }} text-center">
                 <label>Unidad Solicitante:</label>
                  <select name="serv_id" 
                      class="form-control select2" 
                      id="servicios_id">
                    <option value="">Seleccione la entidad solicitante</option>
                      @foreach ($solicitantes as $solicitante)
                        <option value="{{ $solicitante->id }}"
                          {{ old('serv_id', $general->serv_id) == $solicitante->id ? 'selected' : '' }}
                          >{{ $solicitante->solicitantes }} </option>
                          
                      @endforeach
                  </select>
                   {!! $errors->first('serv_id', '<span class="help-block">:message</span>') !!}
            </div>
            <input type="hidden" name="seccion" value="{{ $general->seccion }}">
          <div class=" {{ $errors->has('descripcion') ? 'has-error' : '' }}">
            <label for="message-text">Descripcion del trabajo que realizará:</label>
            {!! Form::textarea('descripcion',old('descripcion',$general->descripcion),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Ingrese el trabajo que realizara el taller de CARPINTERÍA, máximo 200 caracteres']) !!}
              {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
          </div>
          <div class="{{ $errors->has('responsable') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Responsable (JEFE):</label>
            {!! Form::text('responsable',old('responsable',$general->responsable),['class'=>'form-control','placeholder'=>'Director de carrera o Jefe inmediato superior']) !!}
              {!! $errors->first('responsable', '<span class="help-block">:message</span>') !!}
          </div>
          <br>
          @if($general->active === true)    
              <center>
                  <button class="btn btn-primary btn-sm"><b>Guardar la Solicitud </b><i class="fa fa-save" aria-hidden="true"></i></button>
              </center>
              {!! Form::close()  !!}<br>
              <center> 
          @else
              <div class="text-center" style="background:#f2dede" >La solicitud no se puede EDITAR o ELIMINAR porque ya se atendio con normalidad.</div>
              </center>
          @endif

        </div>
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
  <style>
    .container{
            font-family: "Times New Roman", Times, serif;
        }
  </style>
@endpush

@push('scripts') 
    <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
  <script>
    $('#servicios_id').select2({
    });
</script>
@endpush