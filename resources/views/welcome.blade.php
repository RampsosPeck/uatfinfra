@extends('layout')

@section('content')

@if(session()->has('flash'))    
    <div class="container">
        <div class="alert alert-success">
            {{ session('flash') }}
        </div>
    </div>
@endif 

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><strong>Universidad Autónoma "Tomás Frías"</strong></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <b>Menu
          <i class="fa fa-bars"></i></b>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services"><strong>Información</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact"><strong>Contactate</strong></a>
            </li>

            @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}"><strong>Inicio</strong></a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('login') }}"><strong>Ingresar</strong></a>
                    </li>
                    
                    <li class="nav-item">    
                        <a class="nav-link js-scroll-trigger" href="{{ route('register') }}"><strong>Register</strong></a>     
                    </li>
                    @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To Our Website!</div>
          <div class="intro-heading">Depto. Infraestructura</div>
          @if (Route::has('login'))
                  @auth
                  <li class="nav-item">
                      <a class="btn btn-xl js-scroll-trigger" href="{{ url('/home') }}">Mostrar</a>
                  </li>
                  @else
                  <li class="nav-item">
                      <a class="btn btn-xl js-scroll-trigger" href="{{ route('login') }}">Ingresar</a>
                  </li>
                  @endauth
          @endif
         <!-- <a href="redirect">REDIRECT</a>  -->
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Información</h2>
            <h3 class="section-subheading text-muted">Acceda a la pagina oficial de la U.A.T.F.</h3>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="title m-b-md">
                    U. A. T. F.
                    <img class="img-circle" width="150" src="{!! URL::to('/img/uatf.jpg') !!}">
                </div>
                <div class="linksis">
                    <a href="http://uatf.edu.bo" target="_blank">www.uatf.edu.bo</a>
                    <a href="https://www.facebook.com/universidadtomasfrias/" target="_blank">Facebook</a>
                    <a href="https://www.facebook.com/jorge.peralta.3576224" target="_blank">
                Website administrator</a>
                </div>
            </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Contactenos</h2>
            <h3 class="section-subheading text-muted">Puede contactarse con el administrador del sitio web</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">

            <form method="POST" action="{{ route('messages.store') }}" >

              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label><font color="#fed136">Nombre Completo</font></label>
                      <input class="form-control"   name="name" type="text" placeholder="Su nombre completo *" value="{{ old('name') }}">
                     <font color="red">
                      {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                      </font>
                  </div>
                  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                      <label><font color="#fed136">Correo Electrónico</font></label>
                      <input class="form-control" id="email" name="email" type="email" placeholder="Su correo electrónico *" required data-validation-required-message="Porfavor introdusca su dirección de correo electrónico." value="{{ old('email') }}">
                      <p class="help-block text-danger">
                      @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                      @endif</p>
                  </div>
                  <div class="form-group {{ $errors->has('celular') ? 'has-error' : '' }}">
                    <label><font color="#fed136">Número de teléfono</font></label>
                    <input class="form-control" type="number" name="celular" placeholder="Su número de teléfono *"  value="{{ old('calular') }}">
                    <p class="help-block text-danger">
                    @if ($errors->has('celular'))
                          <span class="help-block">
                              <strong>{{ $errors->first('celular') }}</strong>
                          </span>
                      @endif</p>
                  </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}"><br>
                        
                        {!! Form::textarea('body',old('body'),['class'=>'form-control', 'rows'=>'6','placeholder'=>'Ingresa aqui el contenido de tu mensaje.', 'id'=>'men','data-validation-required-message'=>'Porfavor introdusca su mensaje.']) !!}
                        <p class="help-block text-danger">
                        {!! $errors->first('body', '<span class="help-block">:message</span>') !!}</p>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-xl" type="submit">Enviar mensaje</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</body>
@endsection