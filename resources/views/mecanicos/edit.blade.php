@extends('automotives.layout')

@section('content')
<div class="container">
    
 
     
  <div class="panel-body">
         
<div class="panel panel-default">
  <div class="panel-heading"><center><h3 class="box-title"><b><FONT COLOR="#3c8dbc">EDITAR EL TRABAJADO REALIZADO</FONT></b></h3></center></div>
  <div class="panel-body" STYLE="background:#bce8f1">
      
{!! Form::model($mecanicos,['route'=>['mecanicos.update',$mecanicos->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
              {{ csrf_field() }}

    <input type="hidden" name="sol_id" id="sol_id" value="{{ $mecanicos->sol_id }}">

    <div class="form-group{{ $errors->has('kilome') ? ' has-error' : '' }}">
        <label for="kilome" class="col-md-4 control-label">Kilometraje:</label>

        <div class="col-md-6">
            <input id="kilome" type="number" class="form-control" name="kilome" value="{{ old('kilome',$mecanicos->kilome) }}" placeholder="Ejm. 25863" >

            @if ($errors->has('kilome'))
                <span class="help-block">
                    <strong>{{ $errors->first('kilome') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
        <label for="fecha" class="col-md-4 control-label">Fecha:</label>

        <div class="col-md-6">
            <input id="fecha" type="date" class="form-control" value={{ old('fecha',$mecanicos->fecha) }} name="fecha" placeholder="dd/mm/aaaa">
            @if ($errors->has('fecha'))
                <span class="help-block">
                    <strong>{{ $errors->first('fecha') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
        <label for="cantidad" class="col-md-4 control-label">Cantidad:</label>

        <div class="col-md-6">
            <input id="cantidad" type="text" class="form-control" name="cantidad" value="{{ old('cantidad',$mecanicos->cantidad) }}" placeholder="Ejm. 3 piezas">

            @if ($errors->has('cantidad'))
                <span class="help-block">
                    <strong>{{ $errors->first('cantidad') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
        <label for="nombre" class="col-md-4 control-label">Nombre:</label>

        <div class="col-md-6">
            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre',$mecanicos->nombre) }}" placeholder="Ejm. llantas">

            @if ($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
        <label for="descripcion" class="col-md-4 control-label">Descripción:</label>

        <div class="col-md-6">
            <textarea id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Ejm. Se realizó el cambio de llantas tres piezas del vehículo.">{{ $mecanicos->descripcion }}</textarea>

            @if ($errors->has('descripcion'))
                <span class="help-block">
                    <strong>{{ $errors->first('descripcion') }}</strong>
                </span>
            @endif
        </div>
    </div>

     <div class="form-group{{ $errors->has('marca') ? ' has-error' : '' }}">
        <label for="marca" class="col-md-4 control-label">Marca:</label>

        <div class="col-md-6">
            <input id="marca" type="text" class="form-control" name="marca" value="{{ old('marca',$mecanicos->marca) }}" placeholder="Ejm. Godggear">

            @if ($errors->has('marca'))
                <span class="help-block">
                    <strong>{{ $errors->first('marca') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
        <label for="codigo" class="col-md-4 control-label">Código:</label>

        <div class="col-md-6">
            <input id="codigo" type="text" class="form-control" name="codigo" value="{{ old('codigo',$mecanicos->codigo) }}" placeholder="Ejm. ASF-2542">

            @if ($errors->has('codigo'))
                <span class="help-block">
                    <strong>{{ $errors->first('codigo') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('observacion') ? ' has-error' : '' }}">
        <label for="observacion" class="col-md-4 control-label">Observación:</label>

        <div class="col-md-6">
            <textarea id="observacion" type="text" class="form-control" name="observacion" value="{{ old('observacion') }}" placeholder="Ejm. Verificar el número de entrega en el próximo cambio de llantas.">{{ $mecanicos->observacion }}</textarea>

            @if ($errors->has('observacion'))
                <span class="help-block">
                    <strong>{{ $errors->first('observacion') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="modal-footer ">
        <center>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
            <button class="btn btn-primary"><b>Guardar</b></button>
        </center>

    </div>
{{ Form::close() }}

  </div>
</div>
</div></div>
@endsection
@push('styles')
    <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
    </style>
@endpush

