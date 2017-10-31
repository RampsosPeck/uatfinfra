<div class="form-group {{ $errors->has('oil_id') ? 'has-error' : '' }}">
		                    <label for="oil" class="col-sm-4 control-label">Combustible:</label>
			                <div class="col-sm-8">
			                	<div class="input-group">
			                    	<select name="oil_id[]" multiple="multiple" class="form-control select2" id="oil_id" required>
											@foreach ($oils as $oil)
												 <option {{ collect(old('oil_id'))->contains($oil->id) ? 'selected' : '' }} value="{{ $oil->id }}">{{ $oil->name }}</option>
											@endforeach
									</select>
			                    	<span class="input-group-addon" id="basic-addon1">
			                    		<font color="red">
			      							<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
			      						</font>
			      					</span>
			                	</div>
			                	{!! $errors->first('oil_id', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>
	                	<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
		                    <label for="user_id" class="col-sm-4 control-label">Asignado A:</label>
			                <div class="col-sm-8">
			                	<select name="user_id" multiple="multiple" class="form-control select2" id="user_id">
									<option value="">Seleccione un conductor</option>
										@foreach ($users as $user)
											<option value="{{ $user->id }}" 
												{{ old('user_id', $user->user_id ) == $user->id ? 'selected' : '' }}>
												{{ $user->name }}</option>
										@endforeach
								</select>
								{!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
			                </div>
		                </div>