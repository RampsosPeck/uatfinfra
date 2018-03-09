@extends('automotives.layout')

@section('content')

<div class="container">
    <div class="box box-info">
        <div class="box-header">
            <center><h3 class="box-title"><b><FONT COLOR="#3c8dbc">SOLICUTUD DE TRABAJO</FONT> Codigo: </b>{{ $solicitud->solmecodi }}</h3></center>
        </div>
        <div STYLE="background:#bce8f1">
            <form class="form-inline text-center" action="#">
                  <div class="form-group">
                    <label for="users">Sol.:</label>
                    <input type="users" class="form-control" id="users" value="{{ $user->name }}" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="vehiculo">Vehiculo:</label>
                    <input type="vehiculo" class="form-control" id="vehiculo" value="{{ $vehiculo->placa }}" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="fecha" class="form-control" id="fecha" value="{{ $solicitud->fecha }}" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="vehiculo">Vehiculo:</label>
                    <textarea name="vehiculo" class="form-control" readonly="readonly" id="vehiculo" >{{ $solicitud->descripcion }}</textarea>
                  </div>
            </form>
        </div>
        <br>
        <center>
         <button class="btn btn-primary" data-toggle="modal" data-target="#modalMeConcre"><i class="fa fa-plus"></i> CONCRETAR TRABAJOS <i class="fa fa-user"></i></button></center>
        <br>

        <div class="modal fade" id="modalMeConcre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel"><b>INGRESE LOS SIGUENTES DATOS</b></h4>
                </div>
                <div class="modal-body" STYLE="background:#bce8f1">

                    @include('mecanicos.form');

                </div>
            </div>
            </div>
        </div>
        <div STYLE="background:#dff0d8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>kilome</th>
                        <th>fecha</th>
                        <th>nombre</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($mecanicos))
                    @foreach ($mecanicos as $mecanico)
                        <tr>
                            <td>{{ $mecanico->kilome }}</td>
                            <td>{{ $mecanico->fecha }}</td>
                            <td>{{ $mecanico->nombre }}</td>
                            <td>{{ $mecanico->descripcion }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@push('styles')

@endpush

@push('scripts')

<script>

</script>
@unless(request()->is('/mecanicos*'))
  <script>

    if(window.location.hash === '#create')
    {
      $('#modalMeConcre').modal({ 'show' : {{ count($errors) > 0 ? true : false }}  });
    }

    $('#modalMeConcre').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });

    $('#modalMeConcre').on('shown.bs.modal', function(){
       window.location.hash = '#create';
    });

  </script>
@endunless
@endpush