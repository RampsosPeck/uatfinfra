@extends('automotives.layout')
<?php use Carbon\Carbon;?>
@section('content')
<div class="container">
  
  <div class="col-md-12">
          <font color="#007bff"><span class="fa fa-exclamation-circle fa-2x form-control-feedback"></span></font>
            <div class="box-header with-border">
                <center>
                  <h3 class="box-title">
                    <font color="#007bff"><b>INFORME DEL VIAJE</b></font>
                  </h3><br>
                  <b>
                      Los campos con el icono
                      <font color="red">
                          <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                      </font>
                      son obligatorios.
                  </b>
                </center>
            </div>

{!! Form::open(['route'=>'informes.store','method'=>'POST','class'=>'form-horizontal']) !!}
    {{ csrf_field() }}

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
          <CENTER><h3 class="box-title"><b>DATOS DEL VIAJE <font color="blue">Codigo:{{ $viaje->codigo }}</font></b></h3></CENTER>
        </div>
        <div class="box-body" STYLE="background:#bce8f1">
          <div class="form-group">
            <div class=" {{ $errors->has('vehiculo') ? 'has-error' : '' }}">
                <label for="vehiculo" class="col-sm-1 control-label">Vehículo:</label>
                <div class="col-sm-2"> 
                        <select class="form-control select2"
                                name="vehiculo_id"
                                data-placeholder="Uno o dos encargados"
                                style="width: 100%;"
                                >
                          @foreach ($vehiculos as $vehiculo)
                            <option value="{{ $vehiculo->id }}"
                              {{ old('vehiculo_id', $viaje->vehiculo_id) == $vehiculo->id ? 'selected' : '' }}
                              >{{ $vehiculo->placa }} </option>

                          @endforeach
                        </select> 
                    {!! $errors->first('vehiculo', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <input type="hidden" name="viaje_id" value="{{ $viaje->id }}">
            <div class=" {{ $errors->has('conductor') ? 'has-error' : '' }}">
                <label for="conductor" class="col-sm-1 control-label">Conductor:</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <select  class="form-control select2"
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
                  </div>
                  {!! $errors->first('conductor', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <label for="dias" class="col-sm-1 control-label">Dias:</label>
            <div class="col-sm-2"> 
                    <input type="text"
                      class="form-control"
                      name="dias"
                      placeholder="Ejm. 2 dias"
                      value="{{ old('dias',$viaje->dias) }}">
                  {!! $errors->first('dias', '<span class="help-block">:message</span>') !!}
            </div>
            <label for="pasajeros" class="col-sm-1 control-label">Pasajeros:</label>
            <div class="col-sm-1 {{ $errors->has('pasajeros') ? 'has-error' : '' }}">
                  <input type="text"
                    class="form-control"
                    name="pasajeros"
                    id="pasajeros"
                    placeholder="Ejm. 47"
                    value="{{ old('pasajeros', $viaje->pasajeros) }}">
                {!! $errors->first('pasajeros', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
                <label for="fecha_inicial" class="col-sm-1 control-label">Partida:</label>
                <div class="col-sm-2  {{ $errors->has('fecha_inicial') ? 'has-error' : '' }}">
                    <div class="input-group date">                         
                        <input name="fecha_inicial"
                        class="form-control"
                        value="{{ old('fecha_inicial',Carbon::parse($viaje->fecha_inicial)->format('Y-m-d')) }}"
                        id="datepicker">  
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>                     
                    </div>
                    {!! $errors->first('fecha_inicial', '<span class="help-block">:message</span>') !!}
                </div>

                <div class=" {{ $errors->has('horainicial') ? 'has-error' : '' }}">
                  <label for="fecha_final" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horainicial"
                              value="{{ old('horainicial',$viaje->horainicial) }}">
                             <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horainicial', '<span class="help-block">:message</span>') !!} 
                      </div>
                  </div>

                <label for="fecha_final" class="col-sm-1 control-label">Llegada:</label>
                  <div class="col-sm-2  {{ $errors->has('fecha_final') ? 'has-error' : '' }}">
                      <div class="input-group date">
                          <input name="fecha_final"
                          class="form-control"
                          value="{{ old('fecha_final',Carbon::parse($viaje->fecha_final)->format('Y-m-d')) }}"
                          id="datepickere">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>  
                      </div>
                      {!! $errors->first('fecha_final', '<span class="help-block">:message</span>') !!}
                  </div>

                <label for="fecha_final" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2 {{ $errors->has('horafinal') ? 'has-error' : '' }}" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horafinal"
                              value="{{ old('horafinal',$viaje->horafinal) }}">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horafinal', '<span class="help-block">:message</span>') !!}
                      </div>
                  </div>
              </div>
          </div>

<div class="box box-success collapsed-box">
    <div class="box-header with-border">
      <center>DIAS DE VIAJE ADICIONALES</center>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
      </div>
    </div> 
    <div class="box-body" STYLE="background:#d6e9c6">

        <div class="form-group">
            <?php if(empty($viaje->fecha_inicial2)){ $feini2 = null;}else{$feini2 = Carbon::parse($viaje->fecha_inicial2)->format('Y-m-d'); } ?>
                <label for="fecha_inicial" class="col-sm-1 control-label">Partida:</label>
                <div class="col-sm-2  {{ $errors->has('fecha_inicial2') ? 'has-error' : '' }}">
                    <div class="input-group date">                         
                        <input name="fecha_inicial2"
                        class="form-control"
                        value="{{ old('fecha_inicial2',$feini2) }}"
                        id="datepicker2">  
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>                     
                    </div>
                    {!! $errors->first('fecha_inicial', '<span class="help-block">:message</span>') !!}
                </div>
            <?php if(empty($viaje->horainicial2)){ $hoini2 = NULL;}else{$hoini2 = $viaje->horainicial2;} ?>    
                <div class=" {{ $errors->has('horainicial2') ? 'has-error' : '' }}">
                  <label for="fecha_final2" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horainicial2"
                              value="{{ old('horainicial2',$hoini2) }}">
                             <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horainicial2', '<span class="help-block">:message</span>') !!} 
                      </div>
                  </div>
              <?php if(empty($viaje->fecha_inicial2)){ $fefin2 = null;}else{$fefin2 = Carbon::parse($viaje->fecha_final2)->format('Y-m-d'); } ?>
                <label for="fecha_final2" class="col-sm-1 control-label">Llegada:</label>
                  <div class="col-sm-2  {{ $errors->has('fecha_final2') ? 'has-error' : '' }}">
                      <div class="input-group date">
                          <input name="fecha_final2"
                          class="form-control"
                          value="{{ old('fecha_final2',$fefin2) }}"
                          id="datepickere2">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>  
                      </div>
                      {!! $errors->first('fecha_final', '<span class="help-block">:message</span>') !!}
                  </div>
              <?php if(empty($viaje->horafinal2)){ $hofin2 = null;}else{$hofin2 = $viaje->horafinal2;} ?>
                <label for="fecha_final2" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2 {{ $errors->has('horafinal2') ? 'has-error' : '' }}" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horafinal2"
                              value="{{ old('horafinal2',$hofin2) }}">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horafinal2', '<span class="help-block">:message</span>') !!}
                      </div>
                  </div>
              </div>
          </div>
          <?php if(empty($viaje->fecha_inicial3)){ $feini3 = null;}else{$feini3 = Carbon::parse($viaje->fecha_inicial3)->format('Y-m-d'); } ?>
            <div class="form-group">
                <label for="fecha_inicial3" class="col-sm-1 control-label">Partida:</label>
                <div class="col-sm-2  {{ $errors->has('fecha_inicial3') ? 'has-error' : '' }}">
                    <div class="input-group date">                         
                        <input name="fecha_inicial3"
                        class="form-control"
                        value="{{ old('fecha_inicial3',$feini3) }}"
                        id="datepicker3">  
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>                     
                    </div>
                    {!! $errors->first('fecha_inicial3', '<span class="help-block">:message</span>') !!}
                </div>
            <?php if(empty($viaje->horainicial3)){ $hoini3 = null;}else{$hoini3 = $viaje->horainicial3;} ?>
                <div class=" {{ $errors->has('horainicial3') ? 'has-error' : '' }}">
                  <label for="fecha_final" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horainicial3"
                              value="{{ old('horainicial3',$hoini3) }}">
                             <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horainicial3', '<span class="help-block">:message</span>') !!} 
                      </div>
                  </div>
            <?php if(empty($viaje->fecha_inicial3)){ $fefin3 = null;}else{$fefin3 = Carbon::parse($viaje->fecha_final3)->format('Y-m-d'); } ?>
                <label for="fecha_final3" class="col-sm-1 control-label">Llegada:</label>
                  <div class="col-sm-2  {{ $errors->has('fecha_final3') ? 'has-error' : '' }}">
                      <div class="input-group date">
                          <input name="fecha_final3"
                          class="form-control"
                          value="{{ old('fecha_final3',$fefin3) }}"
                          id="datepickere3">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>  
                      </div>
                      {!! $errors->first('fecha_final3', '<span class="help-block">:message</span>') !!}
                  </div>
              <?php if(empty($viaje->horafinal3)){ $hofin3 = null;}else{$hofin3 = $viaje->horafinal3;} ?>
                <label for="fecha_final3" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2 {{ $errors->has('horafinal3') ? 'has-error' : '' }}" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horafinal3"
                              value="{{ old('horafinal3',$hofin3) }}">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horafinal3', '<span class="help-block">:message</span>') !!}
                      </div>
                  </div>
              </div>
          </div>
        <?php if(empty($viaje->fecha_inicial4)){ $feini4 = null;}else{$feini4 = Carbon::parse($viaje->fecha_inicial4)->format('Y-m-d'); } ?>
          <div class="form-group">
                <label for="fecha_inicial4" class="col-sm-1 control-label">Partida:</label>
                <div class="col-sm-2  {{ $errors->has('fecha_inicial4') ? 'has-error' : '' }}">
                    <div class="input-group date">                         
                        <input name="fecha_inicial4"
                        class="form-control"
                        value="{{ old('fecha_inicial4',$feini4) }}"
                        id="datepicker4">  
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>                     
                    </div>
                    {!! $errors->first('fecha_inicial4', '<span class="help-block">:message</span>') !!}
                </div>
            <?php if(empty($viaje->horainicial4)){ $hoini4 = null;}else{$hoini4 = $viaje->horainicial4;} ?>
                <div class=" {{ $errors->has('horainicial4') ? 'has-error' : '' }}">
                  <label for="fecha_final4" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horainicial4"
                              value="{{ old('horainicial4',$hoini4) }}">
                             <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horainicial4', '<span class="help-block">:message</span>') !!} 
                      </div>
                  </div>
            <?php if(empty($viaje->fecha_inicial4)){ $fefin4 = null;}else{$fefin4 = Carbon::parse($viaje->fecha_final4)->format('Y-m-d'); } ?>
                <label for="fecha_final4" class="col-sm-1 control-label">Llegada:</label>
                  <div class="col-sm-2  {{ $errors->has('fecha_final4') ? 'has-error' : '' }}">
                      <div class="input-group date">
                          <input name="fecha_final4"
                          class="form-control"
                          value="{{ old('fecha_final4',$fefin4) }}"
                          id="datepickere4">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>  
                      </div>
                      {!! $errors->first('fecha_final4', '<span class="help-block">:message</span>') !!}
                  </div>
              <?php if(empty($viaje->horafinal4)){ $hofin4 = null;}else{$hofin4 = $viaje->horafinal4;} ?>
                <label for="forafinal4" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2 {{ $errors->has('horafinal4') ? 'has-error' : '' }}" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horafinal4"
                              value="{{ old('horafinal4',$hofin4) }}">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horafinal4', '<span class="help-block">:message</span>') !!}
                      </div>
                  </div>
              </div>
          </div>
          <?php if(empty($viaje->fecha_inicial5)){ $feini5 = null;}else{$feini5 = Carbon::parse($viaje->fecha_inicial5)->format('Y-m-d'); } ?>
          <div class="form-group">
                <label for="fecha_inicial5" class="col-sm-1 control-label">Partida:</label>
                <div class="col-sm-2  {{ $errors->has('fecha_inicial5') ? 'has-error' : '' }}">
                    <div class="input-group date">                         
                        <input name="fecha_inicial5"
                        class="form-control"
                        value="{{ old('fecha_inicial5',$feini5) }}"
                        id="datepicker5">  
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>                     
                    </div>
                    {!! $errors->first('fecha_inicial5', '<span class="help-block">:message</span>') !!}
                </div>
              <?php if(empty($viaje->horainicial5)){ $hoini5 = null;}else{$hoini5 = $viaje->horainicial5;} ?>
                <div class=" {{ $errors->has('horainicial5') ? 'has-error' : '' }}">
                  <label for="horainicial5" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horainicial5"
                              value="{{ old('horainicial5',$hoini5) }}">
                             <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horainicial5', '<span class="help-block">:message</span>') !!} 
                      </div>
                  </div>
              <?php if(empty($viaje->fecha_inicial5)){ $fefin5 = null;}else{$fefin5 = Carbon::parse($viaje->fecha_final5)->format('Y-m-d'); } ?>
                <label for="fecha_final5" class="col-sm-1 control-label">Llegada:</label>
                  <div class="col-sm-2  {{ $errors->has('fecha_final5') ? 'has-error' : '' }}">
                      <div class="input-group date">
                          <input name="fecha_final5"
                          class="form-control"
                          value="{{ old('fecha_final5',$fefin5) }}"
                          id="datepickere5">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>  
                      </div>
                      {!! $errors->first('fecha_final5', '<span class="help-block">:message</span>') !!}
                  </div>
              <?php if(empty($viaje->horafinal5)){ $hofin5 = null;}else{$hofin5 = $viaje->horafinal5;} ?>
                <label for="horafinal5" class="col-sm-1 control-label">Hora:</label>
                  <div class="col-sm-2 {{ $errors->has('horafinal5') ? 'has-error' : '' }}" >
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text"
                              class="form-control timepicker"
                              name="horafinal5"
                              value="{{ old('horafinal5',$hofin5) }}">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          {!! $errors->first('horafinal5', '<span class="help-block">:message</span>') !!}
                      </div>
                  </div>
              </div>
          </div>
     </div>
</div>
    <li class="list-group-item list-group-item-success col-md-12">
         <center><label class="control-label">KILOMETRAJE DEL VIAJE</label></center>
    <div class="form-group" >
        <label for="kmpartida" class="col-sm-2 control-label">Km. Partida:</label>
          <div class="col-sm-2 ">
            <div class="input-group {{ $errors->has('kmpartida') ? 'has-error' : '' }}">
                {!! Form::text('kmpartida',null,['class'=>'form-control','id'=>'kmpartida','value'=>'old("kmpartida")','onkeyup'=>'sumar();','placeholder'=>'30028']) !!}
                <span class="input-group-addon" id="basic-addon1">
                    <font color="red">
                        <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                    </font>
                </span>
            </div>
                {!! $errors->first('kmpartida', '<span class="help-block">:message</span>') !!}
          </div>

          <label for="kmllegada" class="col-sm-2 control-label">Km. Llegada:</label>
          <div class="col-sm-2">
              <div class="input-group {{ $errors->has('kmllegada') ? 'has-error' : '' }}">

                  {!! Form::text('kmllegada',null,['class'=>'form-control','id'=>'kmllegada','value'=>'old("kmllegada")','onkeyup'=>'sumar();','placeholder'=>'40015']) !!}

                  <span class="input-group-addon" id="basic-addon1">
                      <font color="red">
                     <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                     </font>
                  </span>
              </div>
                {!! $errors->first('kmllegada', '<span class="help-block">:message</span>') !!}
          </div>
          <label for="viaticos" class="col-sm-2 control-label">Recorrido total:</label>
          <div class="col-sm-2">
              <div class="input-group {{ $errors->has('kmtotal') ? 'has-error' : '' }}">
                  {!! Form::text('kmtotal',null,['class'=>'form-control','id'=>'kmtotal',' value'=>'0','readonly'=>'readonly']) !!}
                  <span class="input-group-addon" id="basic-addon1">
                    <font color="red">Km.</font>
                  </span>
              </div>
              {!! $errors->first('kmtotal', '<span class="help-block">:message</span>') !!}
          </div>
    </div>

  <hr/>

      <center><label class="control-label">COMBUSTIBLE DEL VIAJE</label></center>
      <div class="form-group">
                <label for="litro1" class="col-sm-1 control-label">Litros:</label>
                  <div class="col-sm-2">
                    <div class="input-group {{ $errors->has('litro1') ? 'has-error' : '' }}">
                        {!! Form::text('litro1',null,['class'=>'form-control','id'=>'litro1','value'=>'old("litro1")','onkeyup'=>'sumar();','placeholder'=>'30.15']) !!}

                        <span class="input-group-addon">Litros</span>
                    </div>
                      {!! $errors->first('litro1', '<span class="help-block">:message</span>') !!}
                  </div>

                   <label for="litro2" class="col-sm-1 control-label">Litros:</label>
                  <div class="col-sm-2 ">
                    <div class="input-group {{ $errors->has('litro2') ? 'has-error' : '' }}">
                      {!! Form::text('litro2',null,['class'=>'form-control','id'=>'litro2','value'=>'old("litro2")','onkeyup'=>'sumar();','placeholder'=>'70.10']) !!}
                        <span class="input-group-addon">Litros</span>
                    </div>
                      {!! $errors->first('litro2', '<span class="help-block">:message</span>') !!}
                  </div>
                  
                  <label for="litro3" class="col-sm-1 control-label">Litros:</label>
                  <div class="col-sm-2 ">
                    <div class="input-group {{ $errors->has('litro3') ? 'has-error' : '' }}">
                      {!! Form::text('litro3',null,['class'=>'form-control','id'=>'litro3','value'=>'old("litro3")','onkeyup'=>'sumar();','placeholder'=>'10']) !!}
                        <span class="input-group-addon">Litros</span>
                    </div>
                      {!! $errors->first('litro3', '<span class="help-block">:message</span>') !!}
                  </div>
                  
        

                  <label for="totallitro" class="col-sm-1 control-label">Total: </label>
                    <div class="col-sm-2 ">
                      <div class="input-group {{ $errors->has('totallitro') ? 'has-error' : '' }}">

                          {!! Form::text('totallitro',null,['class'=>'form-control','id'=>'totallitro','value'=>'0','placeholder'=>'110.25','readonly']) !!}

                          <span class="input-group-addon">Litros</span>
                      </div>
                        {!! $errors->first('totallitro', '<span class="help-block">:message</span>') !!}
                    </div>
                  
        </div>
        <div class="form-group">
                <label for="compra1" class="col-sm-1 control-label">Bs.:</label>
                  <div class="col-sm-2">
                    <div class="input-group {{ $errors->has('compra1') ? 'has-error' : '' }}">
                      {!! Form::text('compra1',null,['class'=>'form-control','id'=>'compra1','value'=>'old("compra1")','onkeyup'=>'sumar();','placeholder'=>'112.15']) !!}

                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('compra1', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="compra2" class="col-sm-1 control-label">Bs.:</label>
                  <div class="col-sm-2 ">
                    <div class="input-group {{ $errors->has('compra2') ? 'has-error' : '' }}">
                        {!! Form::text('compra2',null,['class'=>'form-control','id'=>'compra2','value'=>'old("compra2")','onkeyup'=>'sumar();','placeholder'=>'260.77']) !!}
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('compra2', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="compra3" class="col-sm-1 control-label">Bs.:</label>
                  <div class="col-sm-2 ">
                    <div class="input-group {{ $errors->has('compra3') ? 'has-error' : '' }}">

                      {!! Form::text('compra3',null,['class'=>'form-control','id'=>'compra3','value'=>'old("compra3")','onkeyup'=>'sumar();','placeholder'=>'37.20']) !!}

                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('compra3', '<span class="help-block">:message</span>') !!}
                  </div>
                  
                    <label for="totalbs" class="col-sm-1 control-label">Total:</label>
                    <div class="col-sm-2 ">
                      <div class="input-group {{ $errors->has('totalbs') ? 'has-error' : '' }}">

                        {!! Form::text('totalbs',null,['class'=>'form-control','id'=>'totalbs','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}

                          <span class="input-group-addon">Bs.</span>
                      </div>
                        {!! $errors->first('totalbs', '<span class="help-block">:message</span>') !!}
                  </div>

          </div>
          <hr/>
      <center><label class="control-label">VIÁTICO, PEAJES E IMPREVISTOS</label></center>
      <div class="form-group">
              <label for="viaticos" class="col-sm-1 control-label">Viático:</label>
              <div class="col-sm-1 ">
                <div class="input-group {{ $errors->has('viaticos') ? 'has-error' : '' }}">
                    <input type="text"
                      class="form-control"
                      name="viaticos"
                      id="viaticos"
                      placeholder="117"
                      value="{{ old('viaticos') }}">
                </div>
                  {!! $errors->first('viaticos', '<span class="help-block">:message</span>') !!}
              </div>

                <label for="peaje" class="col-sm-1 control-label">Peajes:</label>
                  <div class="col-sm-2">
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

                  <label for="imprevisto" class="col-sm-1 control-label">Imprevistos:</label>
                  <div class="col-sm-2">
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
                  <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                      <label for="descripcion" class="col-sm-1 control-label">Descripcion:</label>
                      <div class="col-sm-3">
                          {!! Form::textarea('descripcion',old('descripcion'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Realize una descripción del pago de peajes o de los imprevistos']) !!}
                          {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
                      </div>
                  </div>
              </div>
            <hr>
            <center><label class="control-label">DEBOLUCIONES</label></center>
            <div class="form-group">
                <label for="debocombu" class="col-sm-1 control-label">Combustible:</label>
                  <div class="col-sm-2">
                    <div class="input-group {{ $errors->has('debocombu') ? 'has-error' : '' }}">

                        {!! Form::text('debocombu',null,['class'=>'form-control','id'=>'debocombu','value'=>'old("debocombu")','onkeyup'=>'sumar();','placeholder'=>'0.20']) !!}

                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('debocombu', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="debopeaje" class="col-sm-1 control-label">Peaje:</label>
                  <div class="col-sm-2">
                    <div class="input-group {{ $errors->has('debopeaje') ? 'has-error' : '' }}">

                        {!! Form::text('debopeaje',null,['class'=>'form-control','id'=>'debopeaje','value'=>'old("debopeaje")','onkeyup'=>'sumar();','placeholder'=>'8']) !!}
                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('debopeaje', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="deboimprevi" class="col-sm-1 control-label">Imprevistos:</label>
                  <div class="col-sm-2">
                    <div class="input-group {{ $errors->has('deboimprevi') ? 'has-error' : '' }}">

                      {!! Form::text('deboimprevi',null,['class'=>'form-control','id'=>'deboimprevi','value'=>'old("deboimprevi")','onkeyup'=>'sumar();','placeholder'=>'110']) !!}

                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('deboimprevi', '<span class="help-block">:message</span>') !!}
                  </div>
                  <label for="debototal" class="col-sm-1 control-label">Total:</label>
                  <div class="col-sm-2">
                    <div class="input-group {{ $errors->has('debototal') ? 'has-error' : '' }}">

                        {!! Form::text('debototal',null,['class'=>'form-control','id'=>'debototal','value'=>'0','placeholder'=>'Total Bs.','readonly']) !!}

                        <span class="input-group-addon">Bs.</span>
                    </div>
                      {!! $errors->first('debototal', '<span class="help-block">:message</span>') !!}
                  </div>
                  
              </div>
        <hr>      
           <center><label class="control-label">INFORME DEL VIAJE Y RECOMENDACIONES DEL VEHÍCULO</label></center>
            <div class="form-group">
                <label class="col-sm-2 control-label">Informe del viaje y del vehículo:</label>
                <div class=" {{ $errors->has('informe') ? 'has-error' : '' }}">
                    <div class="col-sm-4">
                        {!! Form::textarea('informe',old('informe'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Inserte su informe sobre el viaje y el vehículo durante el viaje',]) !!}
                        {!! $errors->first('informe', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <label class="col-sm-2 control-label"> Recomendación sobre el vehículo:</label>
                <div class="  {{ $errors->has('recomendacion') ? 'has-error' : '' }}">
                    <div class="col-sm-4">
                        {!! Form::textarea('recomendacion',old('recomendacion'),['class'=>'form-control', 'rows'=>'2','placeholder'=>'Inserte su recomendacion sobre el vehículo del viaje']) !!}
                        {!! $errors->first('recomendacion', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>      
            </div>
        </li>
        <center>
            <button type="submit" class="btn btn-primary">
              <b>Registrar el informe</b> <i class="fa fa-check-square-o" aria-hidden="true"></i>

            </button>
          </center>
    </div>
</div> 
{!! Form::close() !!}

</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="/dashboard/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="/dashboard/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="/dashboard/plugins/iCheck/all.css">
  <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
        hr{
            height: 2px;
            background-color: black;
        }
  </style>
@endpush

@push('scripts')
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>
   <script src="/dashboard/plugins/datepicker/bootstrap-datepicker.js"></script>
   <script src="/dashboard/plugins/timepicker/bootstrap-timepicker.min.js"></script>
   <script src="/dashboard/plugins/iCheck/icheck.min.js"></script>
   <script src="/js/sistem/informe.js"></script>
<script>
//Date picker
  $('.timepicker').timepicker({
      showInputs: false
    });
  $('#datepicker').datepicker({
        autoclose: true,
        todayHighlight:true,
        format: 'yyyy-mm-dd',
        clearBtn:true
      });
  $('#datepickere').datepicker({
        autoclose: true,
        todayHighlight:true,
        format: 'yyyy-mm-dd',
        clearBtn:true
      });
  $('#datepicker2, #datepickere2').datepicker({
        autoclose: true,
        todayHighlight:true,
        format: 'yyyy-mm-dd',
        clearBtn:true
      });
  $('#datepicker3, #datepickere3').datepicker({
        autoclose: true,
        todayHighlight:true,
        format: 'yyyy-mm-dd',
        clearBtn:true
      });
  $('#datepicker4, #datepickere4').datepicker({
        autoclose: true,
        todayHighlight:true,
        format: 'yyyy-mm-dd',
        clearBtn:true
      });
  $('#datepicker5, #datepickere5').datepicker({
        autoclose: true,
        todayHighlight:true,
        format: 'yyyy-mm-dd',
        clearBtn:true
      });
  $(".select2").select2({
      language: "es",
      maximumSelectionLength: 1,
      allowClear: true
    });

</script>
@endpush
