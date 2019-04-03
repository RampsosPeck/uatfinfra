<!DOCTYPE html>
<html lang="es">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Infraestructura | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font --> 
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        

  <link rel="shortcut icon" href="{!! URL::to('/img/cityscape.png') !!}" />
  <link href="css/plantilla1.css" rel="stylesheet">
</head>

<body>
 <div id="app">
    
@if(session()->has('flash'))    
    <div class="container">
        <div class="alert alert-success">
            {{ session('flash') }}
        </div>
    </div>
@endif 
@yield('content')


    <footer style="background-color: rgb(0,52,102, 0.8); opacity: 0.5;"> 
        <div class="row">
          <div class="col-md-4">
            <span class="copyright"><font color="#fff"><b>Created by </b><a href="{{ route('politicas') }}">&copy;</a></font><a href="https://www.facebook.com/jorge.peralta.3576224" target="__blank"><b>ING. JORGE PERALTA</b></a></span>
 
          </div>
          <div class="col-md-4">
            <font color="#fff"><b>U.A.T.F. - {{ date('Y') }}. </b></font>
          </div>
          <div class="col-md-4">
            <span class="copyright"><font color="#fff"><b>DEPTO. INFRAESTRUCTURA</b></font></span>
          </div>
        </div> 
    </footer>

  </div>  
<!-- jQuery 3 -->


@include('sweet::alert')
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
 <script src="/js/app.js"></script> 
 <script src="/js/plantilla1.js"></script> 
</body>
</html>


