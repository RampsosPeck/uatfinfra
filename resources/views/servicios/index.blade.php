@extends('automotives.layout')


@section('content') 
 
    <a class="navbar-brand js-scroll-trigger pull-right"> 
      <font color="#fed136" SIZE=5 >  <strong> Depto. de SERVICIOS GENERALES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </font>
    </a>
    <a class="navbar-brand js-scroll-trigger pull-left"> 
      <font color="#fed136" SIZE=5 >  <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U. A. T. F. </strong> </font>
    </a>         
 @include('servicios.carpinteria.create')
<div class="container panelcontrol">
        <div>
          <!-- small box -->
          <div class="small-box bg-aquacontrol text-center">
            <div class="inner"> 
                <h2>
                    <a class="fa" href="{{route('carpinterias.index')}}"  data-toggle="tooltip" data-placement="left" title="Sec. CARPINTERÍA">
                        <font color="yellow"><i class="fa fa-cubes"></i></font>         
                    </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa" href="#"  data-toggle="tooltip" data-placement="top" title="Sec. ELECTRICIDAD">
                        <font color="yellow"><i class="fa fa-plug"></i></font>         
                    </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa" href="#"  data-toggle="tooltip" data-placement="top" title="Sec. JARDINERÍA">
                        <font color="yellow"><i class="fa fa-apple"></i></font>         
                    </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa" href="#"  data-toggle="tooltip" data-placement="top" title="Sec. M. Computadoras">
                        <font color="yellow"><i class="fa fa-television"></i></font>         
                    </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa" href="#"  data-toggle="tooltip" data-placement="top" title="Sec. M. General">
                        <font color="yellow"><i class="fa fa-signing"></i></font>         
                    </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa" href="#"  data-toggle="tooltip" data-placement="top" title="Sec. Albañilería">
                        <font color="yellow"><i class="fa fa-university"></i></font>         
                    </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa" href="#"  data-toggle="tooltip" data-placement="top" title="Sec. Plomería">
                        <font color="yellow"><i class="fa fa-s15"></i></font>         
                    </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa" href="#"  data-toggle="tooltip" data-placement="right" title="Sec. Serv. Generales">
                        <font color="yellow"><i class="fa fa-snowflake-o"></i></font>         
                    </a>
                </h2>

              <p>S E R V I C I O S &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; G E N E R A L E S</p>
            </div>
            <div class="icon" >
             
            </div>
            <a href="{{route('viajes.index')}}" class="small-box-footer">LISTA DE SOLICITUDES <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aquacontrol">
            <div class="inner"> 
              <h3><i class="fa fa-paint-brush"></i></h3>
              
              <a href="{{ route('carpinterias.index') }}"><font color="yellow"><strong><p> CARPINTERIA</p></strong></font></a>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
                <a class="small-box-footer" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalCarpin">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-greencontrol">
            <div class="inner">
              <h3> <i class="fa fa-bolt"></i></h3>

              <p>ELECTRICIDAD</p>
            </div>
            <div class="icon">
              <i class="fa fa-plug"></i>
            </div>
            <a href="#" class="small-box-footer">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellowcontrol">
            <div class="inner"> 
              <h3> <i class="fa fa-tree"></i></h3>

              <p>JARDINERÍA</p>
            </div>
            <div class="icon">
              <i class="fa fa-apple"></i>
            </div>
            <a href="{{route('users.index')}}" class="small-box-footer">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-redcontrol">
            <div class="inner">
              <h3> <i class="fa fa-windows"></i></h3>

              <p>MANTENIMIENTO DE CPU</p>
            </div>
            <div class="icon">
              <i class="fa fa-television"></i>
            </div>
            <a href="#" class="small-box-footer">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellowcontrol">
            <div class="inner">
              <h3><i class="fa fa-cogs"></i></h3>

              <p>MECÁNICO GENERAL</p>
            </div>
            <div class="icon">
              <i class="fa fa-signing"></i>
            </div>
            <a href="#" class="small-box-footer">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aquacontrol">
            <div class="inner">
              <h3> <i class="fa fa-home"></i></h3>

              <p>ALBAÑILERÍA</p>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
            <a href="#" class="small-box-footer">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-greencontrol">
            <div class="inner">
              <h3> <i class="fa fa-random"></i></h3>

              <p>PLOMERÍA</p>
            </div>
            <div class="icon">
              <i class="fa fa-s15"></i>
            </div>
            <a href="#" class="small-box-footer">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-redcontrol">
            <div class="inner">
              <h3><i class="fa fa-snowflake-o"></i></h3>

              <p>SERVICIOS GENERALES</p>
            </div>
            <div class="icon">
              <i class="fa fa-linode"></i>
            </div>
            <a href="#" class="small-box-footer">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <!-- ./col -->
    </div>
</div>
@endsection

@push('styles')
<style>

.panelcontrol {
    color: yellow;
    background-image: url(/img/logines.jpg);
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-position: center center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding-top: 100px;
    padding-bottom: 100px;
}

.bg-aquacontrol{ 
    background-color: rgba(0, 192, 239, 0.6);
}
.bg-greencontrol{
    background-color: rgba(0, 186, 101, 0.6);
}
.bg-yellowcontrol{
    background-color: rgba(243, 156, 18, 0.6);
}
.bg-redcontrol{
    background-color: rgba(221, 75, 57, 0.6);
}

      .container{
            font-family: "Times New Roman", Times, serif;
        }
</style>
@endpush


 