@extends('automotives.layout')

@section('content')
<form class="form-horizontal">
  <div class="col-md-5">
    <div class="box box-success">
        <div class="box-header with-border">
          <CENTER><h3 class="box-title"><b>DATOS DEL VIAJE </b></h3></CENTER>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
       

          <div class="box-body">
            <div class="form-group">
              <label for="vehiculo" class="col-sm-3 control-label">Vehículo:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="vehiculo" id="" placeholder="Vehículo">
              </div>
            </div>
            <div class="form-group">
              <label for="encargado" class="col-sm-3 control-label">Encargado:</label>

              <div class="col-sm-9">
                <input type="text" class="form-control" name="encargado" placeholder="Encargado">
              </div>
            </div>
            
          </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Horizontal Form</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Sign in</button>
          </div>
          <!-- /.box-footer -->
        </form>
    </div>
</div>
</form>
@endsection

@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
@endpush

@push('scripts') 
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
   <script src="/dashboard/plugins/select2/es.js"></script>

<script>
//Date picker
    $("#oil_id").select2({
      placeholder: "Seleccione los combustibles",
      language: "es",
      maximumSelectionLength: 2,
    allowClear: true
    });
    $("#user_id").select2({
      placeholder: "Seleccione un conductor",
      language: "es",
      maximumSelectionLength: 1,
    allowClear: true
    });
    $("#estado").select2({
      placeholder: "Seleccione una opción",
      language: "es",
    allowClear: true
    });
</script>
@endpush



