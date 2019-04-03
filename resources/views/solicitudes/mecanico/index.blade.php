@extends('automotives.layout')
    
@section('content')
@include('alertas.success')
<div class="container">
    <div class="box box-primary">
        <div class="box-header text-center">             
            <h3 class="box-title"><b><FONT COLOR="#3c8dbc">REPORTE DE TRABAJOS REALIZADOS</FONT></b></h3>
        </div>
        <div class="box-body" style="background-color: #bce8f1;"> 
            <form class="form-horizontal" method="POST" action="{{ route('reporte.trabajo') }}"  accept-charset="utf-8"> {{ csrf_field() }}
            <div class="row form-group" >
                  
                <label for="vehiculo" class="col-sm-1 control-label">Vehículo:</label>
                <div class="col-sm-3{{ $errors->has('vehiculo_id') ? 'has-error' : '' }}">
                    <div class="input-group">
                        <select name="vehiculo_id"
                            class="form-control select2"
                            id="vehiculo_id">
                            <option value="">Seleccione un Vehículo</option>
                                @foreach ($vehiculos as $vehiculo)
                                    <option value="{{ $vehiculo->id }}" {{ old('vehiculo_id', $vehiculo->vehiculo_id ) == $vehiculo->id ? 'selected' : '' }}>
                                        {{ $vehiculo->tipo }} {{ $vehiculo->placa }} 
                                    </option>
                                @endforeach
                        </select>
                        <span class="input-group-addon" id="basic-addon1">
                                <font color="red">
                                    <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                                </font>
                        </span>
                    </div>
                    {!! $errors->first('vehiculo_id', '<span class="help-block">:message</span>') !!}
                </div> 
             
                <label for="fecha1" class="col-sm-1 control-label">Desde:</label> 
                <div class="col-sm-2  {{ $errors->has('fecha1') ? 'has-error' : '' }}">
                    <div class="input-group date">
                        <input type="date" name="fecha1" class="form-control" id="datepicker" />
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        {!! $errors->first('fecha1', '<span class="help-block">:message</span>') !!}
                    </div>
                </div> 

                <label for="fecha2" class="col-sm-1 control-label">Hasta:</label> 
                <div class="col-sm-2  {{ $errors->has('fecha2') ? 'has-error' : '' }}">
                    <div class="input-group date">
                        <input type="date" name="fecha2" class="form-control" id="datepickere" />
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        {!! $errors->first('fecha2', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>  
                <div class="col-md-2">
                     <button type="submit"  target="_blank" class="btn btn-info">Mostrar Reporte</button>
                </div>
            </div>
            </form>
            
            
            <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                  <center> REPORTE GENERAL DE TRABAJOS REALIZADOS </center>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                  </div>
                </div> 
                <div class="box-body" style="background-color: #bce8f1;">
                    <div class="form-group">
                        <form class="form-horizontal" method="POST" action="{{ route('reporte.general') }}"  accept-charset="utf-8"> {{ csrf_field() }}
                            <div class="col-sm-2"></div>
                            <label for="titulo" class="col-sm-1 control-label">Título:</label>
                            <div class="col-sm-2  {{ $errors->has('titulo') ? 'has-error' : '' }}">
                                <input type="text" 
                                    class="form-control" 
                                    id="titulo" 
                                    placeholder="1er. Semestre 2018 Informe detallado de buses." 
                                    name="titulo">
                            </div>

                            <label for="fecha1" class="col-sm-1 control-label">Desde:</label> 
                            <div class="col-sm-2  {{ $errors->has('fecha1') ? 'has-error' : '' }}">
                                <div class="input-group date">
                                    <input type="date" name="fecha1" class="form-control" id="datepicker" />
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                    {!! $errors->first('fecha1', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div> 

                            <label for="fecha2" class="col-sm-1 control-label">Hasta:</label> 
                            <div class="col-sm-2  {{ $errors->has('fecha2') ? 'has-error' : '' }}">
                                <div class="input-group date">
                                    <input type="date" name="fecha2" class="form-control" id="datepickere" />
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                    {!! $errors->first('fecha2', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>  
                                         
                            <div class="col-md-1">
                                <button type="submit" target="_blank" class="btn btn-info btn-block">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
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
        .glyphicon {
             align: left;
        }
    table th{
        text-align: center;
    }
  </style>
@endpush

@push('scripts') 
   
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
    
    <script type="text/javascript">
        $("#vehiculo_id").select2({
            placeholder: "Selecione un vehículo",
            language: "es",
            maximumSelectionLength: 2,
            allowClear: true
        });
    </script>
@endpush