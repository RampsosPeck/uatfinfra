@extends('automotives.layout') 

@section('content')

<div class="container">
<br><br><br><br>
<div class="col-md-3">
</div>
<div class="col-md-6">
    <div class="box box-info">
        <div class="box-header with-border">
          <CENTER><h3 class="box-title"><b>EDITAR SOLICITUD PARA EL CARPINTERO</b></h3></CENTER>
        </div>
        <div class="box-body" STYLE="background:#bce8f1" >
      {!! Form::model($carpinteria,['route'=>['carpinterias.update',$carpinteria->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
              {{ csrf_field() }}
            

            <div class="{{ $errors->has('serv_id') ? 'has-error' : '' }} text-center">
                 <label>Seleccione una entidad:</label>
                  <select name="serv_id" 
                      class="form-control select2" 
                      id="servicios_id">
                    <option value="">Seleccione una entidad responsable</option>
                      @foreach ($solicitantes as $solicitante)
                        <option value="{{ $solicitante->id }}"
                          {{ old('serv_id', $carpinteria->serv_id) == $solicitante->id ? 'selected' : '' }}
                          >{{ $solicitante->solicitantes }} </option>
                          
                      @endforeach
                  </select>
                   {!! $errors->first('vehiculo_id', '<span class="help-block">:message</span>') !!}
            </div>
          <div class=" {{ $errors->has('descripcion') ? 'has-error' : '' }}">
            <label for="message-text">Descripcion del trabajo que realizará:</label>
            {!! Form::textarea('descripcion',old('descripcion',$carpinteria->descripcion),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Ingrese el trabajo que realizara el taller de CARPINTERÍA, máximo 200 caracteres']) !!}
              {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
          </div>
          <div class="{{ $errors->has('responsable') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Responsable (JEFE):</label>
            {!! Form::text('responsable',old('responsable',$carpinteria->responsable),['class'=>'form-control','placeholder'=>'Director de carrera o Jefe inmediato superior']) !!}
              {!! $errors->first('responsable', '<span class="help-block">:message</span>') !!}
          </div>
          <br>
          @if($carpinteria->active === true)    
              <center>
                  <button class="btn btn-primary btn-sm"><b>Guardar la Solicitud </b><i class="fa fa-save" aria-hidden="true"></i></button>
              </center>
          {!! Form::close()  !!}<br>
              <center>
              {!! Form::open(['route'=>['carpinterias.destroy',$carpinteria->id],'method'=>'DELETE']) !!}
                  <button type="submit" class="btn btn-danger btn-sm " onClick="javascript: return confirm('¿Estas seguro de eliminar a la solicitud?');">
                      <b>Eliminar la solicitud</b> <i class="fa fa-trash" aria-hidden="true"></i> 
                  </button>
              {!! Form::close() !!} 
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