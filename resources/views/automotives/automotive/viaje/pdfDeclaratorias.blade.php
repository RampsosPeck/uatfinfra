<?php use Carbon\Carbon; use Uatfinfra\User;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dec.{{ $fecha1 }}/{{ $fecha2 }}</title>
    <link rel="stylesheet" href="css/declaratoriaPdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      
      <h1>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS<br /> 
        <h2> DEPTO. DE INFRAESTRUCTURA </h2>
        <div >
            <img   src="img/uatf.jpg" width="100px"/>
        </div>
        <h3> DECLARATORIAS EN COMISIÓN </h3><br /> 
      </h1>

       <center> <strong>Título: {{ $titulo }} Desde: {{ $fecha1 }} Hasta: {{ $fecha2 }}</strong> </center><a><font color="#337ab7;" style="text-align: left;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a>
      <table >
        <thead class="tit">
          <tr>
            <th class="service"><center><b>Nro.</b></center></th>
            <th class="desc"><center><b>Nombre</b></center></th>
            <th class="service"><center><b>Entidad</b></center></th>
            <th class="service"><center><b>Cod. Pre.</b></center></th>
            <th class="service"><center><b>Dias</b></center></th>
            <th class="service"><center><b>Vehículo</b></center></th>
            <th class="service"><center><b>Fecha/Hora de Salida</b></center></th> 
            <th class="service"><center><b>Fecha/Hora de Llegada</b></center></th> 
          </tr>
        </thead>
        @foreach($viajes as $key => $viaje)
        <tbody>
          <tr>
            <td class="text-center"> {{ ++$key }} </td>
            <?php $conductores = \DB::table('users')
            ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
            ->join('viajes', 'viajes.id', '=', 'user_viaje.viaje_id')
            ->select('viajes.*','users.*')
            ->where('viajes.id',$viaje->id)
            ->where('viajes.estado','activo')
            ->get(); ?>
            <td class="service">@foreach($conductores as $conductor) {{ $conductor->name }} @endforeach</td>
            <td>{{ $viaje->entidad }}</td>
            <td>{{ $viaje->codigo }}</td>
            <?php $informe = \DB::table('informes')->where('viaje_id',$viaje->id)->first();?>
            <td>{{ $informe->dias }}</td>
            <?php $vehiculo = \DB::table('vehiculos')->where('id',$informe->vehiculo_id)->first();?>
            <td>{{ $vehiculo->placa }}</td>

            <td>{{ Carbon::parse($informe->fecha_inicial)->format('Y-m-d') }} {{ Carbon::parse($informe->horainicial)->format('h:m')  }}</td>
            <?php 

            if(!empty($informe->fecha_final5)) 
            {
              $ffin = Carbon::parse($informe->fecha_final5)->format('Y-m-d');
              $hfin = Carbon::parse($informe->horafinal5)->format('h:m');
            }
            if(!empty($informe->fecha_final4))
            {
              $ffin = Carbon::parse($informe->fecha_final4)->format('Y-m-d');
              $hfin = Carbon::parse($informe->horafinal4)->format('h:m');
            }
            if(!empty($informe->fecha_final3)) 
            {
              $ffin = Carbon::parse($informe->fecha_final3)->format('Y-m-d');
              $hfin = Carbon::parse($informe->horafinal3)->format('h:m');
            }
            if(!empty($informe->fecha_final2)) 
            {
              $ffin = Carbon::parse($informe->fecha_final2)->format('Y-m-d');
              $hfin = Carbon::parse($informe->horafinal2)->format('h:m');
            }else{
              $ffin = Carbon::parse($informe->fecha_final)->format('Y-m-d');
              $hfin = Carbon::parse($informe->horafinal)->format('h:m');
            }

            ?> 
            <td>{{ $ffin }} {{ $hfin }}</td>

          </tr>
        </tbody>
        @endforeach
    
    
          <tr> 
              <td class="km" colspan="1"></td> 
              <td class="km" colspan="3"><br><br><br>__________________________<br>{{ $admin->name }}<br><b>Admr. del Sistema Web de Infraestructura</b>
              </td>
              
          </tr> 
          <tr> 
              <td class="km" colspan="4"></td> 

              <td class="km" colspan="2">V.º B.º</td> 
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



               