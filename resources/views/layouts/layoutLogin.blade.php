<!DOCTYPE html>
<html lang="es">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Infraestructura | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('/dashboard/bootstrap/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('/dashboard/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('/dashboard/css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('/dashboard/css/AdminLTE.min.css') !!}
  <!-- iCheck -->
  {!! Html::style('/entrar/iCheck/square/blue.css') !!}
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="shortcut icon" href="{!! URL::to('/img/favicon.png') !!}" />
</head>

<body>

@yield('content')


    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright"><font color="#fff"><b>COPYRIGHT&copy; </b></font><a href="https://www.facebook.com/jorge.peralta.3576224" target="_blank"><font color="#fec503"><b>ING. JORGE PERALTA</b></font></a></span>
          </div>
          <div class="col-md-4">
            <font color="#fff"><b>U.A.T.F. - 2018</b></font>
          </div>
          <div class="col-md-4">
            <span class="copyright"><font color="#fff"><b>DEPTO. INFRAESTRUCTURA</b></font></span>
          </div>
        </div>
      </div>
    </footer>

<!-- jQuery 3 -->
{!! Html::script('/entrar/jquery.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('/dashboard/bootstrap/js/bootstrap.min.js') !!}
<!-- iCheck -->
{!! Html::script('/entrar/icheck.min.js') !!}
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>


