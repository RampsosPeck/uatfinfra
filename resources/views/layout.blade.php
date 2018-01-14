<!DOCTYPE html>
<html lang="es">

  <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Welcome to George Peralta's website">
        <meta name="author" content="Ing. George Peralta">

        <title>U.A.T.F. | Infraestructura</title>

        <!-- Bootstrap core CSS -->
        {!! Html::style('/welcome/bootstrap/css/bootstrap.min.css') !!}

        <!-- Custom fonts for this template -->
        <link href="/welcome/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        {!! Html::style('/welcome/agency/css/agency.css') !!}


        <link rel="shortcut icon" href="{!! URL::to('/img/favicon.png') !!}" />

        <style>
            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .linksis > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                text-align: center;
            }

        </style>

  </head>


<!-- Contenido Dinámico -->

@yield('content')


    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright"><font color="#fff"><b>COPYRIGHT&copy; </b></font><a href="https://www.facebook.com/jorge.peralta.3576224" target="_blank"><b>ING. JORGE PERALTA</b></a></span>
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

    
    <!-- Bootstrap core JavaScript -->
{!! Html::script('/welcome/jquery/jquery.min.js') !!}
{!! Html::script('/welcome/popper/popper.min.js') !!}
{!! Html::script('/welcome/bootstrap/js/bootstrap.min.js') !!}

    <!-- Plugin JavaScript -->
{!! Html::script('/welcome/jquery-easing/jquery.easing.min.js') !!}

    <!-- Contact form JavaScript -->
{!! Html::script('/welcome/agency/js/jqBootstrapValidation.js') !!}
{!! Html::script('/welcome/agency/js/contact_me.js') !!}


    <!-- Custom scripts for this template -->
{!! Html::script('/welcome/agency/js/agency.min.js') !!}
{!! Html::script('https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js') !!}

    <script>    
    CKEDITOR.replace( 'men',
    {
        language: 'es',
        toolbar : 'Basic', /* this does the magic */
        uiColor : '#9AB8F3'
    });
    </script>
  </body>

</html>
