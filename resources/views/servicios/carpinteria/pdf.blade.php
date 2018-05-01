<?php use Carbon\Carbon;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Solicitud Nro.{{ $general->id }}</title>
    <link rel="stylesheet" href="css/solicitud.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <h1><b>DEPTO. SERVICIOS GENERALES &nbsp;&nbsp;&nbsp;&nbsp; SECCIÓN {{ mb_strtoupper($general->seccion,'UTF-8') }}</b> <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a></h1>
    <main>
      <div class="tableinfo" id="tableinfo">
        <table border="0" >
          <tr>
              <td class="ks" colspan="4">
                  <div><b>Solicitante: Sr.</b> {{ $general->user->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha:</b> {{ $general->fecha }} </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Código:</b>  {{ $general->coding}} </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="3">
                  <div><b>Unidad Solicitante:</b> {{ $general->servicio->solicitantes }}  </div>
              </td> 
              <td class="ks" colspan="3">
                  <div><b>Recepción: P/......../......../........ Hora: ......:......</b> </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="6"><b>Descripción del Trabajo:</b> {{ $general->descripcion }} </td>
          </tr>
          <tr>
              <td class="km" colspan="3"><br>______________________________<br>{{ $general->responsable }}<br><b>FIRMA DEL RESPONSABLE</b>
              </td>
              <td class="km" colspan="3"><br>______________________________<br>{{ $jefe->name }}<br><b>JEFE DE INFRAESTRUCTURA</b>
              </td>
          </tr>
        </table>
      </div>
    </main>


    <header class="clearfix">
      <h1><b>DEPTO. SERVICIOS GENERALES &nbsp;&nbsp;&nbsp;&nbsp; SECCIÓN {{ mb_strtoupper($general->seccion,'UTF-8') }}</b> <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a></h1>
    <main>
      <div class="tableinfo" id="tableinfo">
        <table border="0" >
          <tr>
              <td class="ks" colspan="4">
                  <div><b>Solicitante: Sr.</b> {{ $general->user->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha:</b> {{ $general->fecha }} </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Código:</b>  {{ $general->coding }} </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="3">
                  <div><b>Unidad Solicitante:</b> {{ $general->servicio->solicitantes }}  </div>
              </td> 
              <td class="ks" colspan="3">
                  <div><b>Recepción: P/......../......../........ Hora: ......:......</b> </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="6"><b>Descripción del Trabajo:</b> {{ $general->descripcion }} </td>
          </tr>
          <tr>
              <td class="km" colspan="3"><br>______________________________<br>{{ $general->responsable }}<br><b>FIRMA DEL RESPONSABLE</b>
              </td>
              <td class="km" colspan="3"><br>______________________________<br>{{ $jefe->name }}<br><b>JEFE DE INFRAESTRUCTURA</b>
              </td>
          </tr>
        </table>
      </div>
    </main>


    <header class="clearfix">
      <h1><b>DEPTO. SERVICIOS GENERALES &nbsp;&nbsp;&nbsp;&nbsp; SECCIÓN {{ mb_strtoupper($general->seccion,'UTF-8') }}</b> <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a></h1>
    <main>
      <div class="tableinfo" id="tableinfo">
        <table border="0" >
          <tr>
              <td class="ks" colspan="4">
                  <div><b>Solicitante: Sr.</b> {{ $general->user->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha:</b> {{ $general->fecha }} </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Código:</b>  {{ $general->coding }} </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="3">
                  <div><b>Unidad Solicitante:</b> {{ $general->servicio->solicitantes }}  </div>
              </td> 
              <td class="ks" colspan="3">
                  <div><b>Recepción: P/......../......../........ Hora: ......:......</b> </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="6"><b>Descripción del Trabajo:</b> {{ $general->descripcion }} </td>
          </tr>
          <tr>
              <td class="km" colspan="3"><br>______________________________<br>{{ $general->responsable }}<br><b>FIRMA DEL RESPONSABLE</b>
              </td>
              <td class="km" colspan="3"><br>______________________________<br>{{ $jefe->name }}<br><b>JEFE DE INFRAESTRUCTURA</b>
              </td>
          </tr>
        </table>
      </div>
    </main>


    <header class="clearfix">
      <h1><b>DEPTO. SERVICIOS GENERALES &nbsp;&nbsp;&nbsp;&nbsp; SECCIÓN {{ mb_strtoupper($general->seccion,'UTF-8') }}</b> <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a></h1>
    <main>
      <div class="tableinfo" id="tableinfo">
        <table border="0" >
          <tr>
              <td class="ks" colspan="4">
                  <div><b>Solicitante: Sr.</b> {{ $general->user->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha:</b> {{ $general->fecha }} </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Código:</b>  {{ $general->coding }} </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="3">
                  <div><b>Unidad Solicitante:</b> {{ $general->servicio->solicitantes }}  </div>
              </td> 
              <td class="ks" colspan="3">
                  <div><b>Recepción: P/......../......../........ Hora: ......:......</b> </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="6"><b>Descripción del Trabajo:</b> {{ $general->descripcion }} </td>
          </tr>
          <tr>
              <td class="km" colspan="3"><br>______________________________<br>{{ $general->responsable }}<br><b>FIRMA DEL RESPONSABLE</b>
              </td>
              <td class="km" colspan="3"><br>______________________________<br>{{ $jefe->name }}<br><b>JEFE DE INFRAESTRUCTURA</b>
              </td>
          </tr>
        </table>
      </div>
    </main>
   
  </body>
</html>






