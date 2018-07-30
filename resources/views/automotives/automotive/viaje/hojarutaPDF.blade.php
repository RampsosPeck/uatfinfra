<?php use Carbon\Carbon; use Uatfinfra\User;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hoja de Ruta Nro.{{ $viaje->id }}</title>
    <link rel="stylesheet" href="css/hojaderutaPdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <br><br><br><br><br>
      </div>
      <h1>HOJA DE RUTA <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a> </h1>
      
        <div id="projecthojaru"> <img  style="float:right;" src="img/images.jpeg" width="70px"/>
          <div><b>CONDUCTOR:</b> @foreach($viaje->conductores as $conductor) {{ $conductor->name }} @endforeach   <b style="float:right;"><b>Código:</b>{{ $viaje->codigo }}</b></div>
          <div><b>ENTIDAD:</b> {{ $viaje->entidad }} &nbsp;&nbsp;&nbsp;&nbsp;<b>RECURSOS:</b> {{ $recurso }} </div>
          
          <div><b>VEHÍCULO:</b> {{ $viaje->vehiculo->placa }} &nbsp;&nbsp;&nbsp;&nbsp;<b>PASAJEROS:</b> {{ $viaje->pasajeros }}&nbsp;&nbsp;&nbsp;&nbsp;<b>DÍAS:</b> {{ $viaje->dias }}</div>
          <div><b>KILOMETRAJE:</b> {{ $ruta->totalkm }} Km. &nbsp;&nbsp;&nbsp;&nbsp;<b>COMBUSTIBLE:</b> {{ $presupuesto->totalcombu }} Litros</div> 
        </div>

        <table >
          <thead class="tit">
            <tr>
              <th class="service"><center>DIA 1) <b> PARTIDA</b> {{ Carbon::parse($viaje->fecha_inicial)->format('d-m-Y')}}</center></th>
              <th class="desc"><center><b>HORA:</b> {{ $viaje->horainicial }}</center></th>
              <th class="service"><center><b>RETORNO</b> {{ Carbon::parse($viaje->fecha_final)->format('d-m-Y')}}</center></th>
              <th class="service"><center><b>HORA:</b> {{ $viaje->horafinal }}</center></th>
            </tr>
            @if(!empty($viaje->fecha_inicial2))
              <tr>
                <th class="service"><center>DIA 2) <b> PARTIDA</b> {{ Carbon::parse($viaje->fecha_inicial2)->format('d-m-Y')}}</center></th>
                <th class="desc"><center><b>HORA:</b> {{ $viaje->horainicial2}}</center></th>
                <th class="service"><center><b>RETORNO</b> {{ Carbon::parse($viaje->fecha_final2)->format('d-m-Y')}}</center></th>
                <th class="service"><center><b>HORA:</b> {{ $viaje->horafinal2}}</center></th>
              </tr>
            @endif()
            @if(!empty($viaje->fecha_inicial3))
              <tr>
                <th class="service"><center>DIA 2) <b> PARTIDA</b> {{ Carbon::parse($viaje->fecha_inicial3)->format('d-m-Y')}}</center></th>
                <th class="desc"><center><b>HORA:</b> {{ $viaje->horainicial3}}</center></th>
                <th class="service"><center><b>RETORNO</b> {{ Carbon::parse($viaje->fecha_final3)->format('d-m-Y')}}</center></th>
                <th class="service"><center><b>HORA:</b> {{ $viaje->horafinal3}}</center></th>
              </tr>
            @endif()
            @if(!empty($viaje->fecha_inicial4))
              <tr>
                <th class="service"><center>DIA 2) <b> PARTIDA</b> {{ Carbon::parse($viaje->fecha_inicial4)->format('d-m-Y')}}</center></th>
                <th class="desc"><center><b>HORA:</b> {{ $viaje->horainicial4}}</center></th>
                <th class="service"><center><b>RETORNO</b> {{ Carbon::parse($viaje->fecha_final4)->format('d-m-Y')}}</center></th>
                <th class="service"><center><b>HORA:</b> {{ $viaje->horafinal4}}</center></th>
              </tr>
            @endif()
            @if(!empty($viaje->fecha_inicial5))
              <tr>
                <th class="service"><center>DIA 2) <b> PARTIDA</b> {{ Carbon::parse($viaje->fecha_inicial5)->format('d-m-Y')}}</center></th>
                <th class="desc"><center><b>HORA:</b> {{ $viaje->horainicial5}}</center></th>
                <th class="service"><center><b>RETORNO</b> {{ Carbon::parse($viaje->fecha_final5)->format('d-m-Y')}}</center></th>
                <th class="service"><center><b>HORA:</b> {{ $viaje->horafinal5}}</center></th>
              </tr>
            @endif()
          </thead>
        </table>
        
     
    <center> <strong>RUTAS DEL VIAJE</strong> </center>
      <table >
        <thead class="tit">
          <tr>
            <th class="service"><center><b>Depto. Origen:</b></center></th>
            <th class="desc"><center><b>Ruta</b></center></th>
            <th class="service"><center><b>Depto. Destino:</b></center></th>
            <th class="service"><center><b>Tiempo Aprox.</b></center></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"><b>{{ $destino1->dep_inicio }}:</b> {{ $destino1->origen }}</td>
            <td class="desc">{{ $destino1->ruta }}</td>
            <td class="service"><b>{{ $destino1->dep_final }}: </b> {{ $destino1->destino }}</td>
            <td class="service"><center>{{ $destino1->tiempo }}</center></td>
          </tr>
          <tr>
            <td class="service"><b>{{ $destino2->dep_inicio }}:</b> {{ $destino2->origen }}</td>
            <td class="desc">{{ $destino2->ruta }}</td>
            <td class="service"><b>{{ $destino2->dep_final }}: </b> {{ $destino2->destino }}</td>
            <td class="service"><center>{{ $destino2->tiempo }}</center></td>
          </tr>
          @if(!empty($destino3))
          <tr>
            <td class="service"><b>{{ $destino3->dep_inicio }}:</b> {{ $destino3->origen }}</td>
            <td class="desc">{{ $destino3->ruta }}</td>
            <td class="service"><b>{{ $destino3->dep_final }}: </b> {{ $destino3->destino }}</td>
            <td class="service"><center>{{ $destino3->tiempo }}</center></td>
          </tr>
          @endif
          @if(!empty($destino4))
          <tr>
            <td class="service"><b>{{ $destino4->dep_inicio }}:</b> {{ $destino4->origen }}</td>
            <td class="desc">{{ $destino4->ruta }}</td>
            <td class="service"><b>{{ $destino4->dep_final }}: </b> {{ $destino4->destino }}</td>
            <td class="service"><center>{{ $destino4->tiempo }}</center></td>
          </tr>
          @endif
          @if(!empty($destino5))
          <tr>
            <td class="service"><b>{{ $destino5->dep_inicio }}:</b> {{ $destino5->origen }}</td>
            <td class="desc">{{ $destino5->ruta }}</td>
            <td class="service"><b>{{ $destino5->dep_final }}: </b> {{ $destino5->destino }}</td>
            <td class="service"><center>{{ $destino5->tiempo }}</center></td>
          </tr>
          @endif
          @if(!empty($destino6))
          <tr>
            <td class="service"><b>{{ $destino6->dep_inicio }}:</b> {{ $destino6->origen }}</td>
            <td class="desc">{{ $destino6->ruta }}</td>
            <td class="service"><b>{{ $destino6->dep_final }}: </b> {{ $destino6->destino }}</td>
            <td class="service"><center>{{ $destino6->tiempo }}</center></td>
          </tr>
          @endif
        </tbody>
      </table> 
        {{ $date }} &nbsp;&nbsp;&nbsp;&nbsp;{{ $hour }}
        <p style="float: right;">_____________________________<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $viaje->supervisor }} <br><b>ENCARGADO DE AUTOMOTORES</b><br></p><br /><br /><br /><br />
      
      <center> <strong>INFORME DEL ENCARGADO DE VIAJE</strong> </center>
        <div id="informe">
          <center><br><b>Partida FECHA: ........ :........ :........ HORA: ........ :........ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llegada FECHA: ........ :........ :........ HORA: ........ :........</b></center>
         <p padding='4px'>................................................................................................................................................................................................................................</p><p padding='4px'>................................................................................................................................................................................................................................</p> <p padding='4px'>................................................................................................................................................................................................................................</p><br>
           <center> _____________________________<br> {{ $viaje->encargado->name }} <br> <b> ENCARGADO DE VIAJE </b><br></center>

        </div> 
        <!--<center>_____________________________<br> {{ $viaje->Encargado->name }} <br>ENCARGADO DE AUTOMOTORES<br></center>
        
          <div class="tableinfo" id="tableinfo">
              <table  >
                <tr>
                    <td class="km" colspan="3"><br><br>_________________<br>   <br><b>Conductor</b>
                    </td>
                    <td class="km" colspan="3"><br><br>_________________<br>   <br><b>Encargado de Automotores</b>
                    </td>          </tr>
              </table>
          </div>
        -->
    </header> 
    <footer>
      <center>Nuevo Sistema Web © 2018 Depto. INFRAESTRUCTURA</center>
    </footer>
  </body>
</html>


