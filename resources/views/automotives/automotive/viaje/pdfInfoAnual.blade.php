<?php use Carbon\Carbon; use Uatfinfra\User; use Uatfinfra\ModelAutomotores\Viaje;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe {{ $date }} </title>
    <link rel="stylesheet" href="css/infoAnualPdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      
      <h1>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS<br /> 
        <h2> DEPTO. DE INFRAESTRUCTURA </h2>
        <div >
            <img   src="img/uatf.jpg" width="120px"/>
        </div>
        <h3> INFORME ANUAL DE VIAJES </h3><br /> 
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
            <th class="service"><center><b>Cant. Viajes</b></center></th>  
          </tr>
        </thead>
      
        <?php $combustot = 0; $totbs = 0; $paxtot = 0; $cantot = 0; $tipa=0; $tipb=0;?>
        @foreach($vehiculos as $key => $vehiculo) 
        <tbody>
          <tr>
            <td class="text-center"> {{ ++$key }} </td>
            <td>{{ $vehiculo->tipo }} {{ $vehiculo->placa }}</td>
            <?php $conduc = User::where('id',$vehiculo->user_id)->first(); ?>
            <td>@if(!empty($conduc)) {{ $conduc->name }} @else {{ "Designado" }}@endif</td>
            <?php $kmtot = 0; foreach($informes as $info){ if($info->vehiculo_id == $vehiculo->id){ $kmtot = $kmtot+$info->kmtotal; }  } ?>
            <td>{{ $kmtot }} </td>
            <?php $combus = 0;  foreach($informes as $info){ if($info->vehiculo_id == $vehiculo->id){ $combus = $combus+$info->totallitro; } } $combustot = $combustot+$combus; ?>
            <td>{{ $combus }}</td>
            <?php $prec = 0; foreach($informes as $info){ if($info->vehiculo_id == $vehiculo->id){ $prec = $prec+$info->totalbs; }  } $totbs = $totbs+$prec; ?>
            <td>{{ $prec }}</td>
            <?php $pax = 0; foreach($informes as $info){ if($info->vehiculo_id == $vehiculo->id){ $pax = $pax+$info->pasajeros; }  } $paxtot = $paxtot+$pax;?>
            <td>{{ $pax }}</td>
            <?php $cuan = 0; foreach($informes as $info){ if($info->vehiculo_id == $vehiculo->id){ $cuan++; }  } $cantot = $cantot+$cuan;?>
            <td>{{ $cuan }}</td>

            <?php $tip= ""; foreach($informes as $info){ if($info->vehiculo_id == $vehiculo->id){ $tip = Viaje::where('id',$info->viaje_id)->first(); }  } ?>
            @if(!empty($tip)) @if($tip->recurso == "viajeuatf") <?php $tipa++; ?> @else  <?php $tipb++; ?> @endif @endif 

          </tr> 
        </tbody>         
        @endforeach
  

          <tr>
              <td class="kn" colspan="4">Total:</td>
              <td class="kn" colspan="1">{{  $combustot }} </td>
              <td class="kn" colspan="1">{{  $totbs }} </td>
              <td class="kn" colspan="1">{{  $paxtot }} </td>
              <td class="kn" colspan="1">{{  $cantot }} </td>
          </tr>

          <tr>
              <td class="kn" colspan="4">Recursos de los viajes:</td>
              <td class="kn" colspan="2"><strong>Viajes U.A.T.F.:</strong>  {{  $tipa }} </td>
              <td class="kn" colspan="2"><strong>Viajes Propio:</strong>  {{  $tipb }} </td>
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



               