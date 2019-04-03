let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/welcome/bootstrap/css/bootstrap.min.css',
    'resources/welcome/font-awesome/css/font-awesome.min.css',
    'resources/welcome/agency/css/agency.css', 
    'resources/dashboard/css/font-awesome.min.css',
    'resources/dashboard/css/ionicons.min.css',
    'resources/dashboard/css/AdminLTE.min.css',
    'resources/entrar/iCheck/square/blue.css' 
], 'public/css/plantilla1.css')
.scripts([ 
    'resources/welcome/jquery/jquery.min.js',
    'resources/welcome/popper/popper.min.js',
    'resources/welcome/bootstrap/js/bootstrap.min.js',
    'resources/welcome/jquery-easing/jquery.easing.min.js',
    'resources/welcome/agency/js/jqBootstrapValidation.js',
    'resources/welcome/agency/js/contact_me.js',
    'resources/welcome/agency/js/agency.min.js',   
    'resources/entrar/icheck.min.js' 
], 'public/js/plantilla1.js')
.js(['resources/assets/js/app.js'],'public/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css'); 



/*
{!! Html::style('/dashboard/bootstrap/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('/dashboard/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('/dashboard/css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('/dashboard/css/AdminLTE.min.css') !!}
  <!-- iCheck -->
  {!! Html::style('/entrar/iCheck/square/blue.css') !!}
  {!! Html::style('/sweetalert/dist/sweetalert.css') !!}
 */

/*
{!! Html::script('/entrar/jquery.min.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- Bootstrap 3.3.7 -->
{!! Html::script('/dashboard/bootstrap/js/bootstrap.min.js') !!}
<!-- iCheck -->
{!! Html::script('/entrar/icheck.min.js') !!}
@include('sweet::alert')
 */


///////////////////
/*

mix.scripts([ 
    'resources/welcome/jquery/jquery.min.js',
    'resources/welcome/popper/popper.min.js',
    'resources/welcome/bootstrap/js/bootstrap.min.js',
    'resources/welcome/jquery-easing/jquery.easing.min.js',
    'resources/welcome/agency/js/jqBootstrapValidation.js',
    'resources/welcome/agency/js/contact_me.js',
    'resources/welcome/agency/js/agency.min.js',
    'resources/welcome/vue.js'
], 'public/js/plantilla1.js')
.js(['resources/assets/js/app.js'],'public/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css');  */

/*
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
 */


/*
<!-- Bootstrap core CSS -->
{!! Html::style('/welcome/bootstrap/css/bootstrap.min.css') !!}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<!-- Custom fonts for this template -->
<link href="/welcome/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

<!-- Custom styles for this template -->
{!! Html::style('/welcome/agency/css/agency.css') !!}

 {!! Html::style('/sweetalert/dist/sweetalert.css') !!}
 */


/*
{!! Html::script('/welcome/jquery/jquery.min.js') !!}
{!! Html::script('/welcome/popper/popper.min.js') !!}
{!! Html::script('/welcome/bootstrap/js/bootstrap.min.js') !!}

    <!-- Plugin JavaScript -->
{!! Html::script('/welcome/jquery-easing/jquery.easing.min.js') !!}

    <!-- Contact form JavaScript -->
{!! Html::script('/welcome/agency/js/jqBootstrapValidation.js') !!}
{!! Html::script('/welcome/agency/js/contact_me.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


    <!-- Custom scripts for this template -->
{!! Html::script('/welcome/agency/js/agency.min.js') !!}
{!! Html::script('https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js') !!}  */