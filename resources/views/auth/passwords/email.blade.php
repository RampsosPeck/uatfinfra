@extends('layouts.layoutLogin')

@section('content')
<body class="hold-transition login-page">
  <div class="login-logo">
    <a  href="/"><font color="#fed136"><b>"Universidad Autónoma Tomás Frías"</b><br>Departamento de Infraestructura</font>
    </a>
  </div>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><strong>INGRESE SU CORREO ELECTRÓNICO PARA ENVIARLE EL LINK</strong></p>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-5 control-label">Correo Electrónico:</label>

                    <div class="col-md-5">
                        <div class="form-group has-feedback">  
                        <input id="email" type="email" class="form-control" placeholder="Ejm. pedro@gmail.com" name="email" value="{{ old('email') }}" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-5">
                        <button type="submit" class="btn btn-info">
                            Envíame el link para <br />restablecer mi clave
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
