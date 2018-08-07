<?php use Carbon\Carbon; use Uatfinfra\User; use Uatfinfra\ModelAutomotores\Viaje; use Uatfinfra\ModelAutomotores\Informe;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe {{ $date }} </title>
    <link rel="stylesheet" href="css/infoVehi.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      
      <h1>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS<br /> 
        <h2> DEPTO. DE INFRAESTRUCTURA </h2>
        <div >
            <img   src="img/uatf.jpg" width="120px"/>
        </div>
        <h3> INFORME DE VIAJES DEL VEHÍCULO {{ $vehiculo->tipo }} {{ $vehiculo->placa }} </h3><br /> 
      </h1>

       <center> <strong>Informe detallado de viajes hasta: </strong> {{ $date }} </center><a><font color="#337ab7;" style="text-align: left;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a>  
      <table class="table-striped"> 
        <thead class="tit">
          <tr>
            <th class="service"><center><b>Nro.</b></center></th>
            <th class="desc"><center><b>Vehículo</b></center></th>
            <th class="service"><center><b>Conductor</b></center></th>
            <th class="service"><center><b>Km. Total</b></center></th>
            <th class="service"><center><b>Combust. ls.</b></center></th> 
            <th class="service"><center><b>Total Bs.</b></center></th> 
            <th class="service"><center><b>Pax.</b></center></th> 
            <th class="service"><center><b>Recursos</b></center></th>  
          </tr>
        </thead>
      
        <?php $kmtot = 0; $combustot = 0; $totbs = 0; $paxtot = 0; $tipa = 0; $tipb = 0;?>
        @foreach($viajes as $key => $viaje) 
        <tbody>
          <tr>
            <td class="text-center"> {{ ++$key }} </td>
            <td>{{ $vehiculo->tipo }} {{ $vehiculo->placa }}</td>
            <?php $conductores = \DB::table('users')
            ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
            ->join('viajes', 'viajes.id', '=', 'user_viaje.viaje_id')
            ->select('viajes.*','users.*')
            ->where('viajes.id',$viaje->id)
            ->where('viajes.estado','activo')
            ->get(); ?>
            <td class="service">@foreach($conductores as $conductor) {{ $conductor->name }} @endforeach</td> 
            <?php $info = Informe::where('viaje_id',$viaje->id)->first();
            $kmtot = $kmtot+$info->kmtotal; $combustot = $combustot+$info->totallitro; 
            $totbs = $totbs+$info->totalbs;  $paxtot = $paxtot+$info->pasajeros; ?>
            <td>{{ $info->kmtotal }} </td> 
            <td>{{ $info->totallitro }}</td> 
            <td>{{ $info->totalbs }}</td>
            <td>{{ $info->pasajeros }}</td> 
            <td>@if($viaje->recurso == 'viajeuatf'){{ "U.A.T.F." }} <?php $tipa++; ?> @else{{ "PROPIOS" }} <?php $tipb++;?> @endif</td>  
           
          </tr> 
        </tbody>         
        @endforeach
  

          <tr>
              <td class="kn" colspan="3">Total:</td>
              <td class="kn" colspan="1">{{  $kmtot }} </td>
              <td class="kn" colspan="1">{{  $combustot }} </td>
              <td class="kn" colspan="1">{{  $totbs }} </td>
              <td class="kn" colspan="1">{{  $paxtot }} </td>
              <td class="kn" colspan="1"> </td>
          </tr>

          <tr>
              <td class="kn" colspan="4">Recursos de los viajes:</td>
              <td class="kn" colspan="2"><strong>Viajes U.A.T.F.:</strong>  {{  $tipa }} </td>
              <td class="kn" colspan="2"><strong>Viajes Propios:</strong>  {{  $tipb }} </td>
          </tr>
   

          <tr> 
              <td class="km" colspan="1"></td> 
              <td class="km" colspan="3"><br><br><br><br>__________________________<br>{{ $admin->name }}<br><b>Admr. del Sistema Web de Infraestructura</b>
              </td>
              
          </tr> 
          <tr> 
              <td class="km" colspan="4"></td> 

              <td class="km" colspan="1">V.º B.º</td> 
              <br />
              <td class="km" colspan="2"><br><br>__________________________<br>{{ $jefe->name }}<br><b>JEFE DE INFRAESTRUCTURA</b>
              </td>
          </tr>
      </table> 
    </header> 
    <footer>
      <center>Nuevo Sistema Web © {{ date('Y') }} Depto. INFRAESTRUCTURA</center>
    </footer>
  </body>
</html>



               