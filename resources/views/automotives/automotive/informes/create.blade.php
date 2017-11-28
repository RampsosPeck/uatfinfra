@extends('automotives.layout')
<?php use Carbon\Carbon;?>
@section('content')
<div class="row">
  
<form class="form-horizontal">

  <div class="col-md-5">
    <div class="box box-info">
        <div class="box-header with-border">
          <CENTER><h3 class="box-title"><b>DATOS DEL VIAJE </b></h3></CENTER>
        </div>
        <div class="box-body" STYLE="background:#bce8f1">
            <div class="form-group {{ $errors->has('vehiculo') ? 'has-error' : '' }}">
                <label for="vehiculo" class="col-sm-3 control-label">Vehículo:</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select name="vehiculo_id" 
                          class="form-control select2" 
                          id="vehiculo">
                          <option value="">Seleccione un Vehículo</option>
                          @foreach ($vehiculos as $vehiculo)
                            <option value="{{ $vehiculo->id }}"
                              {{ old('vehiculo_id', $viaje->vehiculo_id) == $vehiculo->id ? 'selected' : '' }}
                              >{{ $vehiculo->placa }} </option>
                              
                          @endforeach
                          </select>
                          <span class="input-group-addon" id="basic-addon1">
                                    <font color="red">
                                <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                              </font>
                          </span>
                    </div>
                    {!! $errors->first('vehiculo', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('conductor') ? 'has-error' : '' }}">
                <label for="conductor" class="col-sm-3 control-label">Conductor:</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select  class="form-control select2"
                                multiple="multiple"
                                name="conductor"
                                data-placeholder="Uno o dos encargados"
                                style="width: 100%;"
                                >
                      @foreach ($conductores as $conductor)
                         <option value="{{ $conductor->id }}" 
                          {{ collect(old('conductores',$viaje->conductores->pluck('id')))->contains($conductor->id) ? 'selected' : '' }}
                          >{{ $conductor->name }}</option>
                      @endforeach
                        </select>
                      <span class="input-group-addon" id="basic-addon1">
                          <font color="red">
                            <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                          </font>
                      </span>
                  </div>
                  {!! $errors->first('conductor', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
              <label for="fecha_inicial" class="col-sm-3 control-label">Desde:</label>
              <div class="col-sm-9  {{ $errors->has('fecha_inicial') ? 'has-error' : '' }}">
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="fecha_inicial" 
                      class="form-control" 
                      type="date"
                      value="{{ old('fecha_inicial',Carbon::parse($viaje->fecha_inicial)->format('Y/m/d')) }}" 
                      id="datepicker">
                      <span class="input-group-addon" id="basic-addon1">
                        <font color="red">
                          <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                        </font>
                      </span>
                  </div>
                  {!! $errors->first('fecha_inicial', '<span class="help-block">:message</span>') !!}
              </div>
            </div>
            <div class="form-group">
              <label for="fecha_final" class="col-sm-3 control-label">Hasta:</label>
              <div class="col-sm-9  {{ $errors->has('fecha_final') ? 'has-error' : '' }}">
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="fecha_final" 
                      class="form-control" 
                      type="date"
                      value="{{ old('fecha_final',Carbon::parse($viaje->fecha_final)->format('Y/m/d')) }}" 
                      id="datepickere">
                      <span class="input-group-addon" id="basic-addon1">
                        <font color="red">
                          <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                        </font>
                      </span>
                  </div>
                  {!! $errors->first('fecha_final', '<span class="help-block">:message</span>') !!}
              </div>
            </div>
            <div class="form-group">
              <label for="fecha_final" class="col-sm-2 control-label">Partida:</label>
              <div class="col-sm-4" >
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" 
                          class="form-control timepicker" 
                          name="horainicial"
                          value="{{ old('horainicial',$viaje->horainicial) }}">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>
              </div>
              <label for="fecha_final" class="col-sm-2 control-label">Llegada:</label>
              <div class="col-sm-4" >
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" 
                          class="form-control timepicker" 
                          name="horafinal"
                          value="{{ old('horafinal',$viaje->horafinal) }}">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>
              </div>
            </div>
            <div class="form-group {{ $errors->has('dias') ? 'has-error' : '' }}">
                <label for="dias" class="col-sm-2 control-label">Dias:</label>
                <div class="col-sm-4">
                  <div class="input-group">
                      <input type="text" 
                        class="form-control" 
                        name="dias" 
                        placeholder="Ejm. 2 dias" 
                        value="{{ old('dias',$viaje->dias) }}">
                      <span class="input-group-addon" id="basic-addon1">
                          <font color="red">
                      <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                    </font>
                </span>
                  </div>
                    {!! $errors->first('dias', '<span class="help-block">:message</span>') !!}
                </div>
                <label for="pasajeros" class="col-sm-2 control-label">Pax:</label>
                <div class="col-sm-4 ">
                  <div class="input-group {{ $errors->has('pasajeros') ? 'has-error' : '' }}">
                      <input type="number" 
                        class="form-control" 
                        name="pasajeros" 
                        id="pasajeros" 
                        placeholder="Ejm. 47" 
                        value="{{ old('pasajeros', $viaje->pasajeros) }}">
                      <span class="input-group-addon" id="basic-addon1">
                          <font color="red">
                      <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                    </font>
                </span>
                  </div>
                    {!! $errors->first('pasajeros', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <label><font color="#3c8dbc"><b>INFORME DEL VIAJE Y DEL VEHÍCULO</b></font></label>
              <div class="form-group {{ $errors->has('informe') ? 'has-error' : '' }}">
                  <div class="col-sm-12">
                      {!! Form::textarea('informe',old('informe'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Inserte su informe sobre el viaje y el vehículo durante el viaje','required','required']) !!}
                      {!! $errors->first('informe', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
              <label><font color="#3c8dbc"><b>RECOMENDACIÓN SOBRE EL VEHÍCULO</b></font></label>
              <div class="form-group">
                  <div class="col-sm-12">
                      {!! Form::textarea('recomendacion',old('recomendacion'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Inserte su recomendacion sobre el vehículo del viaje','required','required']) !!}
                      {!! $errors->first('recomendacion', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
        </div>
    </div>
  </div>

  <div class="col-md-7">
      <div class="box box-success">
          <div class="box-header with-border">
              <CENTER><h3 class="box-title"><b>INFORME GENERAL</b></h3></CENTER>
          </div>
           
          <div class="box-body"  STYLE="background:#d6e9c6">
              <label><font color="#3c8dbc"><b>KILOMETRAJE</b></font></label>

              <div class="form-group">              
                  <label for="kmpartida" class="col-sm-2 control-label">Partida:</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('kmpartida') ? 'has-error' : '' }}">
                        <input type="number" 
                          class="form-control" 
                          name="kmpartida" 
                          id="kmpartida" 
                          placeholder="Ejm. 30028" 
                          value="{{ old('kmpartida') }}">
                        <span class="input-group-addon" id="basic-addon1">
                            <font color="red">
                              <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                            </font>
                        </span>
                    </div>
                      {!! $errors->first('kmpartida', '<span class="help-block">:message</span>') !!}
                  </div>

                  <label for="kmllegada" class="col-sm-2 control-label">Llegada:</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('kmllegada') ? 'has-error' : '' }}">
                        <input type="number" 
                          class="form-control" 
                          name="kmllegada" 
                          id="kmllegada" 
                          placeholder="Ejm. 40015" 
                          value="{{ old('kmllegada') }}">
                        <span class="input-group-addon" id="basic-addon1">
                            <font color="red">
                           <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                           </font>
                        </span>
                    </div>
                      {!! $errors->first('kmllegada', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
              <label><font color="#3c8dbc"><b>VIÁTICOS</b></font></label>
              <div class="form-group">
                <label for="viaticos" class="col-sm-5 control-label">Total viáticos:</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('viaticos') ? 'has-error' : '' }}">
                        <input type="number" 
                          class="form-control" 
                          name="viaticos" 
                          id="viaticos" 
                          placeholder="Ejm. 10150" 
                          value="{{ old('viaticos') }}">
                        <span class="input-group-addon" id="basic-addon1">
                            <font color="red">
                           <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                           </font>
                        </span>
                    </div>
                      {!! $errors->first('viaticos', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
              <label><font color="#3c8dbc"><b>COMPRA DE COMBUSTIBLE</b></font></label>
              <div class="form-group">
                <label for="litro1" class="col-sm-1 control-label">1):</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('litro1') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="litro1" 
                          id="litro1" 
                          placeholder="Ejm. 10150" 
                          value="{{ old('litro1') }}">
                        <span class="input-group-addon">Litros</span>
                    </div>
                      {!! $errors->first('litro1', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="compra1" class="col-sm-3 control-label">Compra:</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('compra1') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="compra1" 
                          id="compra1" 
                          placeholder="Ejm. 10150" 
                          value="{{ old('compra1') }}">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('compra1', '<span class="help-block">:message</span>') !!}
                  </div>
               
                <label for="litro2" class="col-sm-1 control-label">2):</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('litro2') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="litro2" 
                          id="litro2" 
                          placeholder="Ejm. 10150" 
                          value="{{ old('litro2') }}">
                        <span class="input-group-addon">Litros</span>
                    </div>
                      {!! $errors->first('litro2', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="compra2" class="col-sm-3 control-label">Compra:</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('compra2') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="compra2" 
                          id="compra2" 
                          placeholder="Ejm. 10150" 
                          value="{{ old('compra2') }}">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('compra2', '<span class="help-block">:message</span>') !!}
                  </div>
                <label for="litro3" class="col-sm-1 control-label">3):</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('litro3') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="litro3" 
                          id="litro3" 
                          placeholder="Ejm. 10150" 
                          value="{{ old('litro3') }}">
                        <span class="input-group-addon">Litros</span>
                    </div>
                      {!! $errors->first('litro3', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="compra3" class="col-sm-3 control-label">Compra:</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('compra3') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="compra3" 
                          id="compra3" 
                          placeholder="Ejm. 10150" 
                          value="{{ old('compra3') }}">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('compra3', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>

              <div class="form-group">
                <label for="totallitro" class="col-sm-1 control-label">Total: </label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('totallitro') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="totallitro" 
                          id="totallitro" 
                          placeholder="Ejm. 10150" 
                          value="{{ old('totallitro') }}"
                          readonly="readonly">
                        <span class="input-group-addon">Litros</span>
                    </div>
                      {!! $errors->first('totallitro', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="totalbs" class="col-sm-3 control-label">Total:</label>
                  <div class="col-sm-4 ">
                    <div class="input-group {{ $errors->has('totalbs') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="totalbs" 
                          id="totalbs" 
                          placeholder="Ejm. 10150" 
                          value="{{ old('totalbs') }}"
                          readonly="readonly">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('totalbs', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
              <label><font color="#3c8dbc"><b>PEAJES E IMPREVISTOS</b></font></label>

              <div class="form-group">              
                  <label for="peaje" class="col-sm-2 control-label">Peajes:</label>
                  <div class="col-sm-3">
                    <div class="input-group {{ $errors->has('peaje') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="peaje" 
                          id="peaje" 
                          placeholder="Ejm. 22" 
                          value="{{ old('peaje') }}">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('peaje', '<span class="help-block">:message</span>') !!}
                  </div>

                  <label for="imprevisto" class="col-sm-3 control-label">Imprevistos:</label>
                  <div class="col-sm-4">
                    <div class="input-group {{ $errors->has('imprevisto') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="imprevisto" 
                          id="imprevisto" 
                          placeholder="Ejm. 110" 
                          value="{{ old('imprevisto') }}">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('imprevisto', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
              <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                  <label for="descripcion" class="col-sm-3 control-label">Descripcion:</label>
                  <div class="col-sm-7">
                      {!! Form::textarea('descripcion',old('descripcion'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Realize una descripción del pago de peajes o de los imprevistos','required','required']) !!}
                      {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
              <label><font color="#3c8dbc"><b>DEVOLUCIONES</b></font></label>
              <div class="form-group">
                <label for="debocombu" class="col-sm-3 control-label">Combustible:</label>
                  <div class="col-sm-3">
                    <div class="input-group {{ $errors->has('debocombu') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="debocombu" 
                          id="debocombu" 
                          placeholder="0.20" 
                          value="{{ old('debocombu') }}">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('debocombu', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="debopeaje" class="col-sm-2 control-label">Peaje:</label>
                  <div class="col-sm-3">
                    <div class="input-group {{ $errors->has('debopeaje') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="debopeaje" 
                          id="debopeaje" 
                          placeholder="8" 
                          value="{{ old('debopeaje') }}">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('debopeaje', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="deboimprevi" class="col-sm-3 control-label">Imprevistos:</label>
                  <div class="col-sm-3">
                    <div class="input-group {{ $errors->has('deboimprevi') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="deboimprevi" 
                          id="deboimprevi" 
                          placeholder="110" 
                          value="{{ old('deboimprevi') }}">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('deboimprevi', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="debototal" class="col-sm-2 control-label">Total:</label>
                  <div class="col-sm-3">
                    <div class="input-group {{ $errors->has('debototal') ? 'has-error' : '' }}">
                        <input type="text" 
                          class="form-control" 
                          name="debototal" 
                          id="debototal" 
                          placeholder="total" 
                          value="{{ old('debototal') }}"
                          readonly="readonly">
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('debototal', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
  <center>
    <button type="submit" class="btn btn-sm btn-primary">
      <b>Registrar el informe</b> <i class="fa fa-check-square-o" aria-hidden="true"></i>

    </button>
  </center>
</form>

</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="/dashboard/plugins/datepicker/datepicker3.css"> 
  <link rel="stylesheet" href="/dashboard/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="/dashboard/plugins/iCheck/all.css">
@endpush

@push('scripts') 
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
   <script src="/dashboard/plugins/datepicker/bootstrap-datepicker.js"></script>
   <script src="/dashboard/plugins/timepicker/bootstrap-timepicker.min.js"></script>
   <script src="/dashboard/plugins/iCheck/icheck.min.js"></script>
   <script src="/js/sistem/kilometraje.js"></script>
<script>
//Date picker
  $('.timepicker').timepicker({
      showInputs: false
    });
  $('#datepicker').datepicker({
        autoclose: true,
        todayHighlight:true,
        format: 'yyyy/mm/dd'
      });
  $('#datepickere').datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd'
      });
  $(".select2").select2({
      language: "es",
      maximumSelectionLength: 2,
      allowClear: true
    });
</script>
@endpush



