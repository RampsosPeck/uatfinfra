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
    <p class="login-box-msg"><strong>INGRESE SUS DATOS PERSONALES</strong></p>

    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

      <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="name" class="col-md-3 control-label">Cédula I.:</label>
            <div class="col-md-9">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            
        </div>

        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="name" class="col-md-3 control-label">Clave:</label>
            <div class="col-md-9">  
                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                 <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <strong>Recuérdame</strong>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-info">
                    INGRESAR
                </button>
                
            </div>
        <!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Ingresa con tu cuenta de facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Ingresa con tu cuenta de Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <center><a class="btn btn-link" href="{{ route('password.request') }}"><font color="#fed136"><b>Olvidaste tu contraseña?</b></font></a></center>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

