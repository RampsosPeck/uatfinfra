<?php use Uatfinfra\ModelAutomotores\Viaje; use Uatfinfra\User;?>
<div class="container panelcontrol">
  <div class="titulo" id="titulo">SECCIÓN AUTOMOTORES</div>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aquacontrol">
            <div class="inner">
            <?php $cantvi = Viaje::count(); ?>
              <h3>{{$cantvi}}</h3>

              <p>VIAJES REALIZADOS</p>
            </div>
            <div class="icon">
              <i class="fa fa-bus"></i>
            </div>
            <a href="{{route('viajes.index')}}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-greencontrol">
            <div class="inner">
              <h3>53</h3>

              <p>GRÁFICA DE VIAJES</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellowcontrol">
            <div class="inner">
            <?php $cantus = User::count(); ?>
              <h3>{{$cantus}}</h3>

              <p>USUARIOS REGISTRADOS</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{route('users.index')}}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-redcontrol">
            <div class="inner">
              <h3>65</h3>

              <p>GRÁFICA DE COMBUSTIBLE</p>
            </div>
            <div class="icon">
              <i class="fa fa-pie-chart"></i>
            </div>
            <a href="#" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <!-- ./col -->
    </div>
</div>

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
    padding-top: 250px;
    padding-bottom: 250px;
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
  font-size: 2.10em;
  text-align:  center;
  box-sizing: content-box; 
 }
</style>
@endpush
