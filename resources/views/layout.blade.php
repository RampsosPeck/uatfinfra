<!DOCTYPE html>
<html lang="es">

  <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Welcome to George Peralta's website">
        <meta name="author" content="Ing. George Peralta">

        <title>U.A.T.F. | Infraestructura</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


        <link rel="shortcut icon" href="{!! URL::to('/img/cityscape.png') !!}" />
        <link href="css/plantilla1.css" rel="stylesheet">
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
<body>
   <div id="app">
       

<!-- Contenido Dinámico -->

@yield('content')


    <!-- Footer -->
    <footer>
      <div class="container">
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
      </div>
    </footer>

 </div> 
 @include('sweet::alert')
    <!-- Bootstrap core JavaScript -->
 <script src="/js/app.js"></script> 
 <script src="/js/plantilla1.js"></script> 

    <script>    
   // CKEDITOR.replace( 'men',
  //  {
  //      language: 'es',
  //      toolbar : 'Basic', /* this does the magic */
  //      uiColor : '#9AB8F3'
  //  }); 

    </script>
 
</body>

</html>
