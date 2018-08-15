
<div class="modal fade" id="modalDetalle{{$vehiculo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="exampleModalLabel"><b>DATOS DEL VEHÍCULO {{$vehiculo->placa}}</b></h4>
      </div>
      <div class="modal-body" STYLE="background:#bce8f1">
   
            <div class="form-group">
            	<label for="tipo" class="col-sm-3 control-label">Tipo:</label>
	            <div class="col-md-9 input-group">
	              <input name="tipo" value="{{$vehiculo->tipo }}" type="text" class="form-control pull-right" readonly="readonly"> 
	            </div>
            </div>
        	<div class="form-group">
                <label for="especificacion" class="	col-sm-3 control-label">Especificación: </label>
               	<div class="col-md-9 input-group">	
                    <input type="text" class="form-control" name="especificacion" value="{{ $vehiculo->especificacion }}" id="especificacion" readonly="readonly" >
                </div>
            </div>
            <div class="form-group">
                <label for="color" class="	col-sm-3 control-label">Color: </label>
               	<div class="col-md-9 input-group">	
                    <input type="text" class="form-control" name="color" value="{{ $vehiculo->color }}" id="color" readonly="readonly" >
                </div>
            </div>
            <div class="form-group">
                <label for="modelo" class="	col-sm-3 control-label">Modelo: </label>
               	<div class="col-md-9 input-group">	
                    <input type="text" class="form-control" name="modelo" value="{{ $vehiculo->modelo }}" id="modelo" readonly="readonly" >
                </div>
            </div>
            <div class="form-group">
                <label for="marca" class="	col-sm-3 control-label">Marca: </label>
               	<div class="col-md-9 input-group">	
                    <input type="text" class="form-control" name="marca" value="{{ $vehiculo->marca }}" id="marca" readonly="readonly" >
                </div>
            </div>
            <div class="form-group">
                <label for="chasis" class="	col-sm-3 control-label">Chasis: </label>
               	<div class="col-md-9 input-group">	
                    <input type="text" class="form-control" name="chasis" value="{{ $vehiculo->chasis }}" id="chasis" readonly="readonly" >
                </div>
            </div>
            <div class="form-group">
                <label for="motor" class="	col-sm-3 control-label">Motor: </label>
               	<div class="col-md-9 input-group">	
                    <input type="text" class="form-control" name="motor" value="{{ $vehiculo->motor }}" id="motor" readonly="readonly" >
                </div>
            </div>
            <div class="form-group">
                <label for="cilindrada" class="	col-sm-3 control-label">Cilindrada: </label>
               	<div class="col-md-9 input-group">	
                    <input type="text" class="form-control" name="cilindrada" value="{{ $vehiculo->cilindrada }}" id="cilindrada" readonly="readonly" >
                </div>
            </div>
            <div class="row">
            @foreach($foto as $fo)
                <figure  align="center" class="col-md-4"><img src="{{ $fo->url }}" class="img-responsive" alt=""> </figure>
            @endforeach
            </div>
      </div>
      <div class="modal-footer ">
            <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Dejar de ver</b></button>
            </center>
        </div>
    </div>
  </div>
</div>

