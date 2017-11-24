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
      <h1>HOJA DE RUTA <br /><a>Sistema Web Departamento de Infraestructura U.A.T.F.</a> </h1>
      
      <div id="project">
          <div><span><b>CONDUCTOR:</b></span> @foreach($viaje->conductorES as $conductor) {{ $conductor->name }} @endforeach</div>
          <div><span><b>ENTIDAD:</b></span> {{ $viaje->entidad }} &nbsp;&nbsp;&nbsp;&nbsp;<span><b>PASAJEROS:</b></span> {{ $viaje->pasajeros }} &nbsp;&nbsp;&nbsp;&nbsp;<span><b>DÍAS:</b></span> {{ $viaje->dias }}</div>
          <div><span><b>PARTIDA:</b></span> {{ Carbon::parse($viaje->fecha_inicial)->format('d-m-Y')}} &nbsp;&nbsp;&nbsp;&nbsp;<span><b>HORA:</b></span> {{ $viaje->horainicial }}</div>
          <div><span><b>RETORNO:</b></span> {{ Carbon::parse($viaje->fecha_final)->format('d-m-Y')}} &nbsp;&nbsp;&nbsp;&nbsp;<span><b>HORA:</b></span> {{ $viaje->horafinal }}</div>
          <div><span><b>VEHÍCULO:</b></span> {{ $viaje->vehiculo->placa }} &nbsp;&nbsp;&nbsp;&nbsp;<span><b>KILOMETRAJE:</b></span> {{ $ruta->totalkm }} Km. &nbsp;&nbsp;&nbsp;&nbsp;<span><b>COMBUSTIBLE:</b></span> {{ $presupuesto->totalcombu }} Litros</div>
      </div>
    </header>
    <center><SPAN><strong>RUTAS DEL VIAJE</strong></SPAN></center>
    <main>
      <table >
        <thead>
          <tr>
            <th class="service"><center>Depto. Origen:</center></th>
            <th class="desc"><center>Ruta</center></th>
            <th class="service"><center>Depto. Destino:</center></th>
            <th class="service"><center>Tiempo Aprox.</center></th>
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
        </div>
    </main>
    <footer>
      <center>Nuevo Sistema Web © 2017 Depto. INFRAESTRUCTURA</center>
    </footer>
  </body>
</html>