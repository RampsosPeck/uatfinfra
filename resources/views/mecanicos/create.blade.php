@extends('automotives.layout')

@section('content')
@include('alertas.success')
@include('alertas.errors')
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

       
        
        <div STYLE="background:#dff0d8" class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>KM.</th>
                        <th>FECHA</th>
                        <th>CANT.</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCIÓN</th>
                        <th>MARCA</th>
                        <th>CODIGO</th>
                        <th>OBSERVACIÓN</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($mecanicos))
                    @foreach ($mecanicos as $key => $mecanico)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $mecanico->kilome }}</td>
                            <td>{{ $mecanico->fecha }}</td>
                            <td>{{ $mecanico->cantidad }}</td>
                            <td>{{ $mecanico->nombre }}</td>
                            <td>{{ $mecanico->descripcion }}</td>
                            <td>{{ $mecanico->marca }}</td>
                            <td>{{ $mecanico->codigo }}</td>
                            <td>{{ $mecanico->observacion }}</td>
                            <td>
                                {!!link_to_route('mecanicos.edit', $title = 'Editar', $parameters = $mecanico->id, $attributes = ['class'=>'btn btn-primary btn-xs btn-block fa fa-pencil-square-o'])!!} 

                                {!! Form::open(['route'=>['mecanicos.destroy',$mecanico->id],'method'=>'DELETE']) !!}
                                    
                                        <button type="submit" class="btn btn-danger btn-block btn-xs">
                                            <span class="fa fa-trash"> Eliminar  </span> 
                                        </button>
                                    
                                {!! Form::close() !!}
                            </td>

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
    <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
    table th{
        text-align: center;
    }
  </style>
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