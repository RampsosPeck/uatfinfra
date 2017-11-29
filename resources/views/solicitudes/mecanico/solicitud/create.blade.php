<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  
  {!! Form::open(['route'=>'solicitudes.store','method'=>'POST','class'=>'form-horizontal']) !!}
              {{ csrf_field() }}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header box-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">INGRESA LOS SIGUIENTES DATOS</h4>
        </div>
        <div class="modal-body">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}} ">
             <!-- <label>Título de la publicación</label> -->
              <input name="title" 
                type="text"
                value="{{ old('title') }}" 
                placeholder="Ingresa aqui el título de la publicación" 
                class="form-control" required>
              {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group {{ $errors->has('dep_inicio') ? 'has-error' : '' }}">
                        <label for="dep_inicio" class="col-sm-4 control-label">Depto. de partida:</label>
              <div class="col-sm-8">
                <div class="input-group">
                  {!! Form::select('dep_inicio', config('tipo.depinicio'), null, ['class' => 'form-control  select2','placeholder'=>'Ejm. Potosí','required','style'=>'width: 100%;','id'=>'dep_inicio']) !!}
                    <span class="input-group-addon" id="basic-addon1">
                      <font color="red">
                  <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>
                </font>
              </span>
                </div>
                {!! $errors->first('dep_inicio', '<span class="help-block">:message</span>') !!}
              </div>
            </div>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary">Crear solicitud</button>
        </div>
      </div>
    </div>
  {{ FORM::close() }}
</div>