<?php use Carbon\Carbon;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Nro.{{ $informe->viaje_id }}</title>
    <link rel="stylesheet" href="css/informePdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <br><br><br><br>
      <h1>INFORME DE VIAJE <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a></h1>
    

    <div id="project">
          <div><b>CONDUCTOR:</b> {{ $chofer->name }}</div>
          <div><b>VEHÍCULO:</b> {{ $informe->vehiculo->placa }}</div>
          <div><b>ENTIDAD:</b> {{ $viaje->entidad }}</div>
          <div><b>RESPONSABLE:</b> {{ $encargado->name }}</div>
          <div><b>RECURSOS:</b> {{ $recurso }}</div>
          <div><b>VIÁTICOS:</b> {{ $informe->viaticos }} Bs. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DIAS:</b> {{ $informe->dias }} </div>
    </div>
      <img  style="float:right;" src="img/images.jpeg" width="100px"/>
      <p  style="float:right;"><center><b>Nro.Viaje:</b>{{ $viaje->codigo }}</center></p>
    </header>
    <main>
      <div class="tableinfo" id="tableinfo">
        INFORME DEL VEHÍCULO 
      
        <table border="1" >
          <tr>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE PARTIDA:</b> {{ Carbon::parse($informe->fecha_inicial)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horainicial }} </div>
              </td>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE LLEGADA:</b> {{ Carbon::parse($informe->fecha_final)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horafinal }} </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="2"><b>Partida:</b> {{ $informe->kmpartida }} km. </td>
              <td class="ks" colspan="2"><b>Llegada:</b> {{ $informe->kmllegada }} km. </td>
              <td class="ks" colspan="2"><b>Km. TOTAL:</b> {{ $informe->kmtotal }} km.</td>
          </tr>
        </table>
        INFORME DE LA COMPRA DE COMBUSTIBLE
        <table border="1" >
          <tr>
              <td class="ks" colspan="2"><b>1er. Recargue:</b> {{ $informe->litro1 }} Ls.</td>
              <td class="ks" colspan="2"><b>2do. Recargue:</b> {{ $informe->litro2 }} Ls.</td>
              <td class="ks" colspan="1"><b>3er. Recargue:</b> {{ $informe->litro3 }} Ls.</td>
              <td class="ks" colspan="1"><b>Total litros:</b> {{ $informe->totallitro }} Ls.</td>
          </tr>
          <tr>
              <td class="ks" colspan="2"><b>1er. Pago:</b> {{ $informe->compra1 }} Ls.</td>
              <td class="ks" colspan="2"><b>2do. Pago:</b> {{ $informe->compra2 }} Ls.</td>
              <td class="ks" colspan="1"><b>3er. Pago:</b> {{ $informe->compra3 }} Ls.</td>
              <td class="ks" colspan="1"><b>Total Pago:</b> {{ $informe->totalbs }} Bs.</td>
          </tr>
        </table>
        INFORME SOBRE PRESUPUESTO
        <table border="1" >
          <tr>
              <td class="ks" colspan="4"><b>Descripción de gasto:</b> {{ $informe->descripcion }} Ls.</td>
              <td class="ks" colspan="1"><b>Peaje:</b> {{ $informe->peaje }} Bs.</td>
              <td class="ks" colspan="1"><b>Imprevisto:</b> {{ $informe->imprevisto }} Bs.</td>
          </tr>
        </table>
        INFORME SOBRE DEVOLUCIONES
        <table border="1" >
          <tr>
              <td class="ks" colspan="1"><b>Peaje:</b> {{ $informe->debopeaje }} Bs.</td>
              <td class="ks" colspan="1"><b>Combustible:</b> {{ $informe->debocombu }} Bs.</td>
              <td class="ks" colspan="1"><b>Imprevisto:</b> {{ $informe->deboimprevi }} Bs.</td>
              <td class="ks" colspan="3"><b>Dvlcion Total:</b> {{ $informe->debototal }} Bs.</td>
          </tr>
        </table>
        INFORME GENERAL DEL VIAJE
        <table border="1" >
          <tr>
              <td class="ks" colspan="6"><b>INFORME:</b> {{ $informe->informe }}</td>
          </tr>
        </table>
        RECOMENDACIÓN PARA EL VEHÍCULO
        <table border="1" >
          <tr>
              <td class="ks" colspan="6"><b>RECOMENDACIÓN:</b> {{ $informe->recomendacion }}</td>
          </tr>
        </table>

        <table  >
          <tr>
              <td class="km" colspan="2"><br><br><br><br>__________________________<br>{{ $chofer->name }}<br><b>Conductor</b>
              </td>
              <td class="km" colspan="2"><br><br><br><br>__________________________<br>{{ $jefe->name }}<br><b>Jeje de Infraestructura</b>
              </td>
              <td class="km" colspan="2"><br><br><br><br>__________________________<br>{{ $supervisor->name }}<br><b>Encargado de Automotores</b>
              </td>
          </tr>
        </table>
      </div>
    </main>
  </body>
</html>






