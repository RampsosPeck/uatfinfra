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
                    <div class="col-md-7">
                        <div class="form-group has-feedback">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Ingrese su nombre completo">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('entidad') ? ' has-error' : '' }}">
                    <label for="entidad" class="col-md-3 control-label">Entidad:</label>
                    <div class="col-md-7">
                        <div class="form-group has-feedback">  
                            <input id="entidad" type="text" class="form-control" name="entidad" value="{{ old('entidad') }}" placeholder="Su entidad Ejm. Carrera de Ingeniería de Sistemas" required>
                            <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                            @if ($errors->has('entidad'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entidad') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">E-Mail:</label>
                    <div class="col-md-7">
                        <div class="form-group has-feedback">  
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingrese su correo Ejm. jorge@gmail.com" required>
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
                    
                <div class="{{ $errors->has('cedula') ? ' has-error' : '' }}">
                    <label for="cedula" class="col-md-2 control-label">Cédula:</label>
                    <div class="col-md-4">
                        <div class="form-group has-feedback">  
                            <input id="cedula" type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" placeholder="Cédula de Identidad" required>
                            <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                            @if ($errors->has('cedula'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="{{ $errors->has('celular') ? ' has-error' : '' }}">
                    <label for="celular" class="col-md-2 control-label">Celular:</label>
                    <div class="col-md-4">
                        <div class="form-group has-feedback">  
                            <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}" placeholder="Número de celular" required>
                            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                            @if ($errors->has('celular'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                </div>
                

                <div class="form-group">
                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-2 control-label">Clave:</label>
                        <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <input id="password" type="password" class="form-control" placeholder="5 digitos o mas de a-z 0-9" name="password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>
                </div>
                    <label for="password-confirm" class="col-md-2 control-label">Confirmar clave:</label>
                    <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Vuelva a escribir su clave" name="password_confirmation" required>
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-5 col-md-offset-4">
                        <button type="submit" class="btn btn-info btn-block">
                            REGISTRAME
                        </button>
                    </div>
                </div>
            </form>
            <div class="form-group">
                <div class="social-auth-links text-center">
                  <p>- OH también! -</p>
                <div class="col-md-6">
                  <a href="{{ route('login.social','facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                </div>
                <div class="col-md-6">
                  <a href="{{ route('login.social','google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
                </div>
                </div>
            </div>
            <CENTER><a href="{{ route('login') }}" class="text-center"><font color="#fed136"><b>
            <br />YA TIENES CUENTA?</b></font></a></CENTER>
        </div>
    </div>
</div>
</body>
@endsection

