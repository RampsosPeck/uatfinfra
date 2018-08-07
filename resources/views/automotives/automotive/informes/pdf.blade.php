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
    

    <div id="projecthojaru">
       
         <img  style="float:right;" src="img/uatf.jpg" width="80px"/>
          <div><b>CONDUCTOR:</b> {{ $chofer->name }}  <b style="float:right;">Código: {{ $viaje->codigo }} </b></div>
          <div><b>VEHÍCULO:</b> {{ $informe->vehiculo->placa }}</div>
          <div><b>ENTIDAD:</b> {{ $viaje->entidad }}</div>
          <div><b>RESPONSABLE:</b> {{ $encargado->name }}</div>
          <div><b>RECURSOS:</b> {{ $recurso }}</div>
          <div><b>VIÁTICOS:</b> {{ $informe->viaticos }} Bs. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DIAS:</b> {{ $informe->dias }} </div>
    
     
      
    </div>
    </header>
    <main>
      <div class="tableinfo" id="tableinfo">
        FECHA Y KILOMETRAJE DEL VIAJE 
      
        <table border="1" >
          <tr>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE PARTIDA:</b> {{ Carbon::parse($informe->fecha_inicial)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horainicial }} </div>
              </td>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE LLEGADA:</b> {{ Carbon::parse($informe->fecha_final)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horafinal }} </div>
              </td>
          </tr>
          @if(!empty($informe->fecha_inicial2))
          <tr>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE PARTIDA:</b> {{ Carbon::parse($informe->fecha_inicial2)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horainicial2 }} </div>
              </td>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE LLEGADA:</b> {{ Carbon::parse($informe->fecha_final2)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horafinal2 }} </div>
              </td>
          </tr>
          @endif
          @if(!empty($informe->fecha_inicial3))
          <tr>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE PARTIDA:</b> {{ Carbon::parse($informe->fecha_inicial3)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horainicial3 }} </div>
              </td>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE LLEGADA:</b> {{ Carbon::parse($informe->fecha_final3)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horafinal3 }} </div>
              </td>
          </tr>
          @endif
          @if(!empty($informe->fecha_inicial4))
          <tr>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE PARTIDA:</b> {{ Carbon::parse($informe->fecha_inicial4)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horainicial4 }} </div>
              </td>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE LLEGADA:</b> {{ Carbon::parse($informe->fecha_final4)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horafinal4 }} </div>
              </td>
          </tr>
          @endif
          @if(!empty($informe->fecha_inicial5))
          <tr>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE PARTIDA:</b> {{ Carbon::parse($informe->fecha_inicial5)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horainicial5 }} </div>
              </td>
              <td class="ks" colspan="3">
                  <div><b>FECHA DE LLEGADA:</b> {{ Carbon::parse($informe->fecha_final5)->format('Y-m-d')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> {{ $informe->horafinal5 }} </div>
              </td>
          </tr>
          @endif
          <tr>
              <td class="ks" colspan="2"><b>Kilometraje de Partida:</b> {{ $informe->kmpartida }} km. </td>
              <td class="ks" colspan="2"><b>Kilometraje de Llegada:</b> {{ $informe->kmllegada }} km. </td>
              <td class="ks" colspan="2"><b>Km. TOTAL:</b> {{ $informe->kmtotal }} km.</td>
          </tr>
        </table>
         COMPRA DE COMBUSTIBLE
        <table border="1" >
          <tr>
              <td class="ks" colspan="2"><b>1er. Recargue:</b> {{ $informe->litro1 }} Ls.</td>
              <td class="ks" colspan="2"><b>2do. Recargue:</b> {{ $informe->litro2 }} Ls.</td>
              <td class="ks" colspan="1"><b>3er. Recargue:</b> {{ $informe->litro3 }} Ls.</td>
              <td class="ks" colspan="1"><b>Total litros:</b> {{ $informe->totallitro }} Ls.</td>
          </tr>
          <tr>
              <td class="ks" colspan="2"><b>1er. Pago:</b> {{ $informe->compra1 }} Bs.</td>
              <td class="ks" colspan="2"><b>2do. Pago:</b> {{ $informe->compra2 }} Bs.</td>
              <td class="ks" colspan="1"><b>3er. Pago:</b> {{ $informe->compra3 }} Bs.</td>
              <td class="ks" colspan="1"><b>Total Pago:</b> {{ $informe->totalbs }} Bs.</td>
          </tr>
        </table>
        PEAJE E IMPREVISTOS
        <table border="1" >
          <tr>
              <td class="ks" colspan="4"><b>Descripción de gasto:</b> {{ $informe->descripcion }} Ls.</td>
              <td class="ks" colspan="1"><b>Peaje:</b> {{ $informe->peaje }} Bs.</td>
              <td class="ks" colspan="1"><b>Imprevisto:</b> {{ $informe->imprevisto }} Bs.</td>
          </tr>
        </table>
         DEVOLUCIONES
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
        {{ $date }} {{ $hour }}
        <table  >
          <tr>
              <td class="km" colspan="2"><br><br><br><br>__________________________<br>{{ $chofer->name }}<br><b>CONDUCTOR</b>
              </td>
              <td class="km" colspan="2"><br><br><br><br>__________________________<br>{{ $jefe->name }}<br><b>JEFE DE INFRAESTRUCTURA</b>
              </td>
              <td class="km" colspan="2"><br><br><br><br>__________________________<br>{{ $viaje->supervisor }}<br><b>ENCARGADO DE AUTOMOTORES</b>
              </td>
          </tr>
        </table>
      </div>
    </main>
    <footer>
        <center>Nuevo Sistema Web © {{ date('Y') }} Depto. INFRAESTRUCTURA</center>
    </footer>
  </body>
</html>






