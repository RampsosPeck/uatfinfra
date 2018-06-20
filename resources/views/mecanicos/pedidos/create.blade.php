@extends('automotives.layout')

@section('content')

<div class="container">
	<div class="col-md-11">
    <!-- Horizontal Form -->
        <div class="box box-primary">
        	<font color="#007bff"><span class="fa fa-bus fa-2x form-control-feedback"></span></font>
            <div class="box-header with-border">
              	<center>
              		<h3 class="box-title">
              			<font color="#007bff"><b>REALIZAR PETICION DE MATERIA PARA LA SOL. #</b></font>
          				{{ $solicitud->solmecodi }}
          			</h3>
          		</center>
            </div>
            <!-- form start -->
             {!! Form::open(['route'=>'pedidos.store','method'=>'POST','class'=>'form-horizontal']) !!}
            	{{ csrf_field() }}
           		<input type="hidden" name="sol_id" value="{{ $solicitud->id }}">
                <div class="box-body" STYLE="background:#bce8f1">
            		<div class="col-md-6">                	 
		                <div class="form-group {{ $errors->has('kilome') ? 'has-error' : '' }}">
		                    <label for="kilome" class="col-sm-4 control-label">Kilometraje:</label>
		                    <div class="col-sm-8">
		                        <input type="number" 
		                        class="form-control" 
		                        name="kilome"
		                        value="{{ old('kilome') }}"
		                        placeholder="Ejm. 1562">
		                        {!! $errors->first('kilome', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
		                <div class="form-group {{ $errors->has('justificacion') ? 'has-error' : '' }}">
		                    <label for="justificacion" class="col-sm-4 control-label">Justificación:</label>
		                    <div class="col-sm-8">
		                        	<textarea class="form-control" name="justificacion" id="justificacion" placeholder="Justifique su solicitud de pedido de material.">{{ old('justificacion') }}</textarea>
			                	{!! $errors->first('justificacion', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
	                    <div class="form-group" >
		                    <div class="{{ $errors->has('cant1') ? 'has-error' : '' }}">
			                    <label for="cant1" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant1" placeholder="1-1"  value="{{ old('cant1') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med1') ? 'has-error' : '' }}">
			                    <label for="med1" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med1" placeholder="metros"  value="{{ old('med1') }}">
			                    </div>
		                    </div>
		                    <div class="{{ $errors->has('cant2') ? 'has-error' : '' }}">
			                    <label for="cant2" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant2" placeholder="1-2"  value="{{ old('cant2') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med2') ? 'has-error' : '' }}">
			                    <label for="med2" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med2" placeholder="galones"  value="{{ old('med2') }}">
			                    </div>
		                    </div>
	                	
		                    <div class="{{ $errors->has('cant3') ? 'has-error' : '' }}">
			                    <label for="cant3" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant3" placeholder="1-3"  value="{{ old('cant3') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med3') ? 'has-error' : '' }}">
			                    <label for="med3" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med3" placeholder="centimetros"  value="{{ old('med3') }}">
			                    </div>
		                    </div>
		                    <div class="{{ $errors->has('cant4') ? 'has-error' : '' }}">
			                    <label for="cant4" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant4" placeholder="1-4"  value="{{ old('cant4') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med4') ? 'has-error' : '' }}">
			                    <label for="med4" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med4" placeholder="valde"  value="{{ old('med4') }}">
			                    </div>
		                    </div>
		                    <div class="{{ $errors->has('cant5') ? 'has-error' : '' }}">
			                    <label for="cant5" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant5" placeholder="1-5"  value="{{ old('cant5') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med5') ? 'has-error' : '' }}">
			                    <label for="med5" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med5" placeholder="hoja"  value="{{ old('med5') }}">
			                    </div>
		                    </div>
		                    <div class="{{ $errors->has('cant6') ? 'has-error' : '' }}">
			                    <label for="cant6" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant6" placeholder="1-6"  value="{{ old('cant6') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med6') ? 'has-error' : '' }}">
			                    <label for="med6" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med6" placeholder="pliego"  value="{{ old('med6') }}">
			                    </div>
		                    </div>
		                    <div class="{{ $errors->has('cant7') ? 'has-error' : '' }}">
			                    <label for="cant7" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant7" placeholder="1-7"  value="{{ old('cant7') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med7') ? 'has-error' : '' }}">
			                    <label for="med7" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med7" placeholder="pulgadas"  value="{{ old('med7') }}">
			                    </div>
		                    </div>
		                    <div class="{{ $errors->has('cant8') ? 'has-error' : '' }}">
			                    <label for="cant8" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant8" placeholder="1-8"  value="{{ old('cant8') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med8') ? 'has-error' : '' }}">
			                    <label for="med8" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med8" placeholder="etc."  value="{{ old('med8') }}">
			                    </div>
		                    </div>
		                    <div class="{{ $errors->has('cant9') ? 'has-error' : '' }}">
			                    <label for="cant9" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant9" placeholder="1-9"  value="{{ old('cant9') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med9') ? 'has-error' : '' }}">
			                    <label for="med9" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med9" placeholder="etc."  value="{{ old('med9') }}">
			                    </div>
		                    </div>
		                    <div class="{{ $errors->has('cant10') ? 'has-error' : '' }}">
			                    <label for="cant10" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant10" placeholder="1-10"  value="{{ old('cant10') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med10') ? 'has-error' : '' }}">
			                    <label for="med10" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med10" placeholder="etc."  value="{{ old('med10') }}">
			                    </div>
		                    </div>
		                    <div class="{{ $errors->has('cant11') ? 'has-error' : '' }}">
			                    <label for="cant11" class="col-sm-2 control-label">Cantidad:</label>
							    <div class="col-sm-3">
				                  	<input type="number" class="form-control" name="cant11" placeholder="1-11"  value="{{ old('cant11') }}">
				                </div>
			                </div>
			                <div class=" {{ $errors->has('med11') ? 'has-error' : '' }}">
			                    <label for="med11" class="col-sm-3 control-label">U. Medida:</label>
			                    <div class="col-sm-4">
			                    	<input type="text" class="form-control" name="med11" placeholder="etc."  value="{{ old('med11') }}">
			                    </div>
		                    </div>
	                	</div>
                    </div>
                    <div class="col-md-6">

	                    <div class="form-group {{ $errors->has('idh') ? 'has-error' : '' }}">
						    <label for="idh" class="col-sm-6 control-label">Vehiculo con IDH? SI:</label>
						    <div class="col-sm-6">
			                  	<input type="radio" name="idh" value="SI" {{ old('idh') == 'SI' ? 'checked' : '' }}  class="flat-red" > 
			                	</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                	<label>
			                		NO:
			                  	<input type="radio" name="idh" value="NO" {{ old('idh') == 'NO' ? 'checked' : '' }}  class="flat-red" >
			                	</label>
			                	<strong>{!! $errors->first('idh', '<span class="help-block">:message</span>') !!}</strong>
			                </div>
			            </div>

		                <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }}">
		                    <label for="observacion" class="col-sm-4 control-label">Observación:</label>
		                    <div class="col-sm-8">
		                        	<textarea class="form-control" name="observacion" placeholder="Puede realizar alguna observación en su pedido de material."> {{ old('observacion') }} </textarea>
			                	{!! $errors->first('observacion', '<span class="help-block">:message</span>') !!}
		                    </div>
	                    </div>
		                <div class="{{ $errors->has('des1') ? 'has-error' : '' }}">
		                    <label for="des1" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des1" id="des1" placeholder="Realicé una descripción del material." value="{{ old('des1') }}">
			                </div>
		                </div>
		                <div class="{{ $errors->has('des2') ? 'has-error' : '' }}">
		                    <label for="des2" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des2" id="des2" placeholder="Realicé una descripción del material." value="{{ old('des2') }}">
			                </div>
		                </div>
		                <div class="{{ $errors->has('des3') ? 'has-error' : '' }}">
		                    <label for="des3" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des3" id="des3" placeholder="Realicé una descripción del material." value="{{ old('des3') }}">
			                </div>
		                </div>
		                <div class="{{ $errors->has('des4') ? 'has-error' : '' }}">
		                    <label for="des4" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des4" id="des4" placeholder="Realicé una descripción del material." value="{{ old('des4') }}">
			                </div>
		                </div>
		                <div class="{{ $errors->has('des5') ? 'has-error' : '' }}">
		                    <label for="des5" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des5" id="des5" placeholder="Realicé una descripción del material." value="{{ old('des5') }}">
			                </div>
		                </div><div class="{{ $errors->has('des6') ? 'has-error' : '' }}">
		                    <label for="des6" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des6" id="des6" placeholder="Realicé una descripción del material." value="{{ old('des6') }}">
			                </div>
		                </div>
		                <div class="{{ $errors->has('des7') ? 'has-error' : '' }}">
		                    <label for="des7" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des7" id="des7" placeholder="Realicé una descripción del material." value="{{ old('des7') }}">
			                </div>
		                </div>
		                <div class="{{ $errors->has('des8') ? 'has-error' : '' }}">
		                    <label for="des8" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des8" id="des8" placeholder="Realicé una descripción del material." value="{{ old('des8') }}">
			                </div>
		                </div>
		                <div class="{{ $errors->has('des9') ? 'has-error' : '' }}">
		                    <label for="des9" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des9" id="des9" placeholder="Realicé una descripción del material." value="{{ old('des9') }}">
			                </div>
		                </div>
		                <div class="{{ $errors->has('des10') ? 'has-error' : '' }}">
		                    <label for="des10" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des10" id="des10" placeholder="Realicé una descripción del material." value="{{ old('des10') }}">
			                </div>
		                </div>
		                <div class="{{ $errors->has('des11') ? 'has-error' : '' }}">
		                    <label for="des11" class="col-sm-3 control-label">Descripción.:</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="des11" id="des11" placeholder="Realicé una descripción del material." value="{{ old('des11') }}">
			                </div>
		                </div>
                    </div>

              	</div>	                	
              	<!-- /.box-body -->
              	<div class="box-footer">
              		<center>
                	<button type="submit" class="btn btn-success">Guardar los datos</button>
              		</center>
              	</div>
              	<!-- /.box-footer -->
            {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

@push('styles')
	<style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
    </style>
@endpush





