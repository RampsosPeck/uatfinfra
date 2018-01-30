<?php use Carbon\Carbon;?>
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
        <br><br><br><br><br><br><br>
      </div>
      <h1>HOJA DE RUTA <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a> </h1>
      
      <div id="project">
          <div><b>CONDUCTOR:</b> @foreach($viaje->conductores as $conductor) {{ $conductor->name }} @endforeach  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Código:</b>{{ $viaje->codigo }}</div>
          <div><b>ENTIDAD:</b> {{ $viaje->entidad }} &nbsp;&nbsp;&nbsp;&nbsp;<b>RECURSOS:</b> {{ $recurso }} </div>
          <div><b>PARTIDA:</b> {{ Carbon::parse($viaje->fecha_inicial)->format('d-m-Y')}} &nbsp;&nbsp;&nbsp;&nbsp;<b>HORA:</b> {{ $viaje->horainicial }}</div>
          <div><b>RETORNO:</b> {{ Carbon::parse($viaje->fecha_final)->format('d-m-Y')}} &nbsp;&nbsp;&nbsp;&nbsp;<b>HORA:</b> {{ $viaje->horafinal }}</div>
          <div><b>VEHÍCULO:</b> {{ $viaje->vehiculo->placa }} &nbsp;&nbsp;&nbsp;&nbsp;<b>PASAJEROS:</b> {{ $viaje->pasajeros }}&nbsp;&nbsp;&nbsp;&nbsp;<b>DÍAS:</b> {{ $viaje->dias }}</div>
          <div><b>KILOMETRAJE:</b> {{ $ruta->totalkm }} Km. &nbsp;&nbsp;&nbsp;&nbsp;<b>COMBUSTIBLE:</b> {{ $presupuesto->totalcombu }} Litros</div>
      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <img  style="float:right;" src="img/index.png" width="80px"/>
    </header>
    <center><SPAN><strong>RUTAS DEL VIAJE</strong></SPAN></center>
    <main>
      <table >
        <thead>
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
        <div id="informe"><h4><b>INFORME:</b>  {{ $viaje->encargado->name }} &nbsp;&nbsp;&nbsp;&nbsp;<b>HORA DE PARTIDA: ...... :...... :...... &nbsp;&nbsp;&nbsp;&nbsp;HORA DE LLEGADA: ...... :...... :......</b></h4><br>
          <p padding='4px'>................................................................................................................................................................................................................................</p><br><p padding='4px'>................................................................................................................................................................................................................................</p><br>
        </div><br><br>
        <center>_____________________________<br>Firma <br> {{ $viaje->encargado->name }}</center>
        <!--
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
    </main>
    <footer>
      <center>Nuevo Sistema Web © 2018 Depto. INFRAESTRUCTURA</center>
    </footer>
  </body>
</html>


