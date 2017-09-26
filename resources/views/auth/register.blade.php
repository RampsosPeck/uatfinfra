@extends('layouts.layoutLogin')

@section('content')
<body class="hold-transition login-page">
  <div class="login-logo">
    <a  href="/"><font color="#fed136"><b>"Universidad Autónoma Tomás Frías"</b><br>Departamento de Infraestructura</font>
    </a>
  </div>
<div class="register-box">
  <div class="register-box-body">
    <p class="login-box-msg"><b>INGRESA TUS DATOS PERSONALES</b></p>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Nombre:</label>
                    <div class="col-md-9">
                        <div class="form-group has-feedback">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">E-Mail:</label>
                    <div class="col-md-9">
                        <div class="form-group has-feedback">  
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-3 control-label">Clave:</label>
                        <div class="col-md-9">
                        <div class="form-group has-feedback">
                            <input id="password" type="password" class="form-control" name="password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-md-3 control-label">Confirma clave:</label>
                    <div class="col-md-9">
                        <div class="form-group has-feedback">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-info">
                            Registrarse
                        </button>
                    </div>
                </div>
            </form>
            <div class="social-auth-links text-center">
              <p>- OR -</p>
              <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                Facebook</a>
              <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+</a>
            </div>
            <CENTER><a href="{{ route('login') }}" class="text-center"><font color="#fed136"><b>YA TIENES CUENTA?</b></font></a></CENTER>
        </div>
    </div>
</div>
</body>
@endsection

