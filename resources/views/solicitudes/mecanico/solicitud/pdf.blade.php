<?php use Carbon\Carbon;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Solicitud Nro.{{ $solicitud->id }}</title>
    <link rel="stylesheet" href="css/solicitudes.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <h1><b>SOLICITUD DE TRABAJO INTERNO &nbsp;&nbsp;&nbsp;&nbsp; SECCIÓN MECÁNICA AUTOMOTRIZ</b> <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a></h1>
    
    </header>
    <main>
      <div class="tableinfo" id="tableinfo">
        <table border="0" >
          <tr>
              <td class="ks" colspan="4">
                  <div><b>Solicitante: Sr.</b> {{ $solicitud->user->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha:</b> {{ $solicitud->fecha }} </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Kilometraje:</b> {{ $solicitud->vehiculo->kilometraje }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Sol. M.#:</b> {{ $solicitud->solmecodi }} </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="2">
                  <div><b>Mobilidad:</b> {{ $solicitud->vehiculo->tipo }}  {{ $solicitud->vehiculo->placa }}</div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Tipo:</b> @foreach($solicitud->tags as $tag){{ $tag->name }} @endforeach  </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Recepción: P/......../......../........ Hora: ......:......</b> </div>
              </td>
          </tr> 
          <tr>
              <td class="ks" colspan="6"><b>Descripción del Trabajo:</b> {{ $solicitud->descripcion }} </td>
          </tr>
          <tr>
              <td class="km" colspan="3"><br>______________________________<br>{{ $supervisor->name }}<br><b>Encargado de Automotores</b>
              </td>
              <td class="km" colspan="3"><br>______________________________<br>{{ $jefe->name }}<br><b>Jeje de Infraestructura</b>
              </td>
          </tr>
        </table>
      </div>
    </main>
   
    <header class="clearfix">
      <br> 
      <h1><b>SOLICITUD DE TRABAJO INTERNO &nbsp;&nbsp;&nbsp;&nbsp; SECCIÓN MECÁNICA AUTOMOTRIZ</b> <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a></h1>
    
    </header>
    <main>
      <div class="tableinfo" id="tableinfo">
        <table border="0" >
          <tr>
              <td class="ks" colspan="4">
                  <div><b>Solicitante: Sr.</b> {{ $solicitud->user->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha:</b> {{ $solicitud->fecha }} </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Kilometraje:</b> {{ $solicitud->vehiculo->kilometraje }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Sol. M.#:</b> {{ $solicitud->solmecodi }} </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="2">
                  <div><b>Mobilidad:</b> {{ $solicitud->vehiculo->tipo }}  {{ $solicitud->vehiculo->placa }}</div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Tipo:</b> @foreach($solicitud->tags as $tag){{ $tag->name }} @endforeach  </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Recepción: P/......../......../........ Hora: ......:......</b> </div>
              </td>
          </tr> 
          <tr>
              <td class="ks" colspan="6"><b>Descripción del Trabajo:</b> {{ $solicitud->descripcion }} </td>
          </tr>
          <tr>
              <td class="km" colspan="3"><br>______________________________<br>{{ $supervisor->name }}<br><b>Encargado de Automotores</b>
              </td>
              <td class="km" colspan="3"><br>______________________________<br>{{ $jefe->name }}<br><b>Jeje de Infraestructura</b>
              </td>
          </tr>
        </table>
      </div>
    </main>
   

   
    <header class="clearfix">
      <br> 
      <h1><b>SOLICITUD DE TRABAJO INTERNO &nbsp;&nbsp;&nbsp;&nbsp; SECCIÓN MECÁNICA AUTOMOTRIZ</b> <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a></h1>
    
    </header>
    <main>
      <div class="tableinfo" id="tableinfo">
        <table border="0" >
          <tr>
              <td class="ks" colspan="4">
                  <div><b>Solicitante: Sr.</b> {{ $solicitud->user->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha:</b> {{ $solicitud->fecha }} </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Kilometraje:</b> {{ $solicitud->vehiculo->kilometraje }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Sol. M.#:</b> {{ $solicitud->solmecodi }} </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="2">
                  <div><b>Mobilidad:</b> {{ $solicitud->vehiculo->tipo }}  {{ $solicitud->vehiculo->placa }}</div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Tipo:</b> @foreach($solicitud->tags as $tag){{ $tag->name }} @endforeach  </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Recepción: P/......../......../........ Hora: ......:......</b> </div>
              </td>
          </tr> 
          <tr>
              <td class="ks" colspan="6"><b>Descripción del Trabajo:</b> {{ $solicitud->descripcion }} </td>
          </tr>
          <tr>
              <td class="km" colspan="3"><br>______________________________<br>{{ $supervisor->name }}<br><b>Encargado de Automotores</b>
              </td>
              <td class="km" colspan="3"><br>______________________________<br>{{ $jefe->name }}<br><b>Jeje de Infraestructura</b>
              </td>
          </tr>
        </table>
      </div>
    </main>
  
 
    <header class="clearfix">
      <br> 
      <h1><b>SOLICITUD DE TRABAJO INTERNO &nbsp;&nbsp;&nbsp;&nbsp; SECCIÓN MECÁNICA AUTOMOTRIZ</b> <br /><a><font color="#337ab7;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a></h1>
    
    </header>
    <main>
      <div class="tableinfo" id="tableinfo">
        <table border="0" >
          <tr>
              <td class="ks" colspan="4">
                  <div><b>Solicitante: Sr.</b> {{ $solicitud->user->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha:</b> {{ $solicitud->fecha }} </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Kilometraje:</b> {{ $solicitud->vehiculo->kilometraje }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Sol. M.#:</b> {{ $solicitud->solmecodi }} </div>
              </td>
          </tr>
          <tr>
              <td class="ks" colspan="2">
                  <div><b>Mobilidad:</b> {{ $solicitud->vehiculo->tipo }}  {{ $solicitud->vehiculo->placa }}</div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Tipo:</b> @foreach($solicitud->tags as $tag){{ $tag->name }} @endforeach  </div>
              </td>
              <td class="ks" colspan="2">
                  <div><b>Recepción: P/......../......../........ Hora: ......:......</b> </div>
              </td>
          </tr> 
          <tr>
              <td class="ks" colspan="6"><b>Descripción del Trabajo:</b> {{ $solicitud->descripcion }} </td>
          </tr>
          <tr>
              <td class="km" colspan="3"><br>______________________________<br>{{ $supervisor->name }}<br><b>Encargado de Automotores</b>
              </td>
              <td class="km" colspan="3"><br>______________________________<br>{{ $jefe->name }}<br><b>Jeje de Infraestructura</b>
              </td>
          </tr>
        </table>
      </div>
    </main>
  </body>
</html>






