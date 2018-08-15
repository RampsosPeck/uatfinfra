@extends('automotives.layout')

@section('content')
@include('alertas.success')

<div class="container">
    <div class="box box-info">
        <div class="box-header with-border">
          <CENTER><h3 class="box-title"><b>EDITAR SOLICITUD</b></h3></CENTER>
        </div>
        <div class="box-body" STYLE="background:#bce8f1" >
        {!! Form::model($permiviaje,['route'=>['roles.update',$permiviaje->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
              {{ csrf_field() }} 

          <div class="form-group {{ $errors->has('motivo') ? 'has-error' : '' }}">
              <label for="message-text" class="control-label col-md-1">Motivo:</label>
              <div class="form-group col-md-2">
                {!! Form::textarea('motivo',old('motivo',$permiviaje->motivo),['class'=>'form-control', 'rows'=>'2', 'placeholder'=>'Ingrese el motivo del Permiso' ]) !!}
                {!! $errors->first('motivo', '<span class="help-block">:message</span>') !!}
              </div> 
              <div class="{{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="message-text" class="col-md-1 control-label">Fecha:</label>
                <div class="col-md-2">
                {!! Form::date('fecha',old('fecha',$permiviaje->fecha),['class'=>'form-control','placeholder'=>'06-05-2018']) !!}
                  {!! $errors->first('fecha', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="{{ $errors->has('dias') ? 'has-error' : '' }}">
                <label for="message-text" class="col-md-1 control-label">Dias:</label>
                <div class="col-md-2">
                {!! Form::number('dias',old('dias',$permiviaje->dias),['class'=>'form-control','placeholder'=>'2']) !!}
                  {!! $errors->first('dias', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="{{ $errors->has('tipo') ? 'has-error' : '' }}">
                <label for="message-text" class="col-md-1 control-label">Tipo:</label>
                <div class="col-md-2"> 
                    <div class="{{ $errors->has('vehiculo_id') ? 'has-error' : '' }} text-center">
                          <select name="tipo" class="form-control select2" id="tipo_id" 
                        style="width: 100%;"  
                        value="{{old('tipo')}}">
                        <option value="">Permisos</option> 
                              @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}"
                                  {{ old('tipo', $permiviaje->tipo) == $tipo->id ? 'selected' : '' }}
                                  >{{ $tipo->nombre }} </option>
                                  
                              @endforeach
                          </select>
                           {!! $errors->first('tipo', '<span class="help-block">:message</span>') !!}
                    </div> 
                </div>
              </div>
          </div>

          <center> 
            <button type="submit" class="btn btn-sm btn-primary">
              <b>Registrar el informe</b> <i class="fa fa-check-square-o" aria-hidden="true"></i>
            </button>
          </center>
        {!! Form::close() !!}
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
    table th{
        text-align: center;
    }
  </style>
@endpush

@push('scripts') 
    <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
<script>
    $('.select2').select2({

      language: "es" 
    }); 
</script>
@endpush