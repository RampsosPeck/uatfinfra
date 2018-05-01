@extends('automotives.layout')


@section('content') 

 @include('servicios.carpinteria.create')
 @include('servicios.electricidad.create')
 @include('servicios.jardineria.create')
 @include('servicios.megeneral.create')
 @include('servicios.albanileria.create')
 @include('servicios.plomeria.create')
 @include('servicios.sergeneral.create')
 
<div class="container panelcontrol">
  <div class="titulo" id="titulo">SERVICIOS GENERALES</div>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aquacontrol">
            <div class="inner"> 
              <h3><i class="fa fa-paint-brush"></i></h3>
              
              <a href="{{ route('generales.index') }}"><font color="yellow"><strong><p> CARPINTERÍA</p></strong></font></a>
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
 
              <strong><p>
              {!!link_to_action('Servicio\GeneralController@getElectrico', $title = ' ELÉCTRICO', $parameters = '', $attributes = ['style'=>'color:yellow'])!!}
            </p></strong>

            </div>
            <div class="icon">
              <i class="fa fa-plug"></i>
            </div>
            <a class="small-box-footer" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalElec">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellowcontrol">
            <div class="inner"> 
              <h3> <i class="fa fa-tree"></i></h3>
              <strong><p>
              {!!link_to_action('Servicio\GeneralController@getJardineria', $title = ' JARDINERÍA', $parameters = '', $attributes = ['style'=>'color:yellow'])!!}
            </p></strong>
            </div>
            <div class="icon">
              <i class="fa fa-apple"></i>
            </div>
            <a class="small-box-footer" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalJar">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
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
              <strong>
                <p>{!!link_to_action('Servicio\GeneralController@getMegeneral', $title = 'MECÁNICO GENERAL', $parameters = '', $attributes = ['style'=>'color:yellow'])!!}</p>
              </strong>
            </div>
            <div class="icon">
              <i class="fa fa-signing"></i>
            </div>
            <a class="small-box-footer" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalMegene">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aquacontrol">
            <div class="inner">
              <h3> <i class="fa fa-home"></i></h3>
              <strong>
                <p>{!!link_to_action('Servicio\GeneralController@getAlbanileria', $title = 'ALBAÑILERÍA', $parameters = '', $attributes = ['style'=>'color:yellow'])!!}</p>
              </strong>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
             <a class="small-box-footer" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAlba">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-greencontrol">
            <div class="inner">
              <h3> <i class="fa fa-random"></i></h3>
              <strong>
                <p>{!!link_to_action('Servicio\GeneralController@getPlomeria', $title = 'PLOMERÍA', $parameters = '', $attributes = ['style'=>'color:yellow'])!!}</p>
              </strong>
            </div>
            <div class="icon">
              <i class="fa fa-s15"></i>
            </div>
            <a class="small-box-footer" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalPlome">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-redcontrol">
            <div class="inner">
              <h3><i class="fa fa-snowflake-o"></i></h3>
              <strong>
                <p>{!!link_to_action('Servicio\GeneralController@getPlomeria', $title = 'SERV. GENERAL', $parameters = '', $attributes = ['style'=>'color:yellow'])!!}</p>
              </strong>
            </div>
            <div class="icon">
              <i class="fa fa-linode"></i>
            </div>
            <a class="small-box-footer" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalServe">Crear Solicitud de trabajo <i class="fa fa-arrow-circle-right"></i></a>
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
 .titulo{
  font-weight: bolder;
  box-sizing: inherit;
  font-size: 2.75em;
  text-align:  center;
  box-sizing: content-box; 
 }
</style>
@endpush


 