@extends('layouts.layoutLogin')

@section('content')
<body class="hold-transition login-page">
  <div class="login-logo">
    <a  href="/"><font color="#fed136"><b>"Universidad Autónoma Tomás Frías"</b><br>Departamento de Infraestructura</font>
    </a>
  </div>
@if(session()->has('info'))
  <div class="container">
    <div class="alert alert-info">
      <strong><h4><center>{{ session('info') }}</center></h4></strong>
    </div>
  </div>
@endif
<div class=" col-md-12 login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><strong>INGRESE SUS DATOS PERSONALES</strong></p>

    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

      <div class="form-group row has-feedback{{ $errors->has('cedula') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 cozl-form-label text-md-right">Cédula de Identidad:</label>
            <div class="col-md-6">
                <input id="cedula" type="number" class="form-control" name="cedula" value="{{ old('cedula') }}" required autofocus placeholder="Ingrese su Cédula de Identidad">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('cedula'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cedula') }}</strong>
                    </span>
                @endif
            </div>
            
        </div>

        <div class="form-group row has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="name" class="col-md-4 cozl-form-label text-md-right">Clave / Contraseña:</label>
            <div class="col-md-6">  
                <input id="password" type="password" class="form-control" name="password" required placeholder="Ingrese su Clave o Contraseña">
                 <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group row has-feedback">
             <!--<label for="name" class="col-md-7 control-label">
              <div class="checkbox icheck">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <strong class="col-md-4 cozl-form-label text-md-right">Recuérdame</strong>
                  </label>
              </div>
            </label>-->
            <div class="col-md-4 mx-auto">
                <button type="submit" class="btn btn-info btn-block">
                    INGRESAR
                </button>
            </div>
        </div>
    </form>
 <!-- /.social-auth-links 
    <div class="form-group ">
      <div class="social-auth-links text-center col-md-12">
        <p>- OH también! -</p>
      <div class="col-md-6 ">
        <a href="{{ route('login.social','facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Ingresa con tu cuenta de facebook</a>
      </div>
      <div class="col-md-6 ">
        <a href="{{ route('login.social','google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Ingresa con tu cuenta de Google+</a>
      </div>
      </div>
    </div>-->
   

    <center><a class="btn btn-link" href="{{ route('password.request') }}"><font color="#fed136"><b><br />Olvidaste tu contraseña?</b></font></a></center>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

