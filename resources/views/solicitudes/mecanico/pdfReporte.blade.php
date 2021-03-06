<?php use Carbon\Carbon; use Uatfinfra\User; use Uatfinfra\ModelMecanico\Mecanico; use Uatfinfra\ModelMecanico\Devolucion;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte {{ $date }} </title>
    <link rel="stylesheet" href="css/reportePdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      
      <h1>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS<br /> 
        <h2> DEPTO. DE INFRAESTRUCTURA </h2>
        <div >
            <img   src="img/uatf.jpg" width="110px"/>
        </div><br>
        <h3> REPORTE DE TRABAJO DEL VEHÍCULO  {{ $vehiculo->tipo }} {{ $vehiculo->placa }} </h3><br /> 
      </h1>

        <a><font color="#337ab7;" style="text-align: left;">Sistema Web Departamento de Infraestructura U.A.T.F.</font></a>  
      <table class="table-striped"> 
        <thead class="tit">
          <tr>
            <th class="service"><center><b>Nro.</b></center></th>
            <th class="service"><center><b>Solicitante</b></center></th>
            <th class="desc"><center><b>Cod./Sol.</b></center></th>
            <th class="service"><center><b>Trabajo realizado</b></center></th>
            <th class="service"><center><b>Fecha</b></center></th>  
            <th class="service"><center><b>Deb./Mat.</b></center></th>  
          </tr>
        </thead>
        @foreach($solicitudes as $solicitud) 
        <tbody>
          <?php $mecanicos = Mecanico::where('sol_id',$solicitud->id)->get(); 
            $user = User::where('id',$solicitud->user_id)->first();?>
          @foreach($mecanicos as $key => $mecanico) 
            <tr>
              <td class="text-center"> {{ ++$key }} </td>
              <td>{{ $user->name }}</td>
              <td>{{ $solicitud->solmecodi }}</td>
              <td>{{ $mecanico->descripcion }}</td>
              <td>{{ $mecanico->fecha }}</td>
              <?php $devolucion = Devolucion::where('sol_id',$solicitud->id)->first(); ?>
              @if(!empty($devolucion))
                  <td>{{ "SI Existe" }} </td> 
              @else
                  <td>{{ "NO Existe" }}</td>  
              @endif
            </tr>
          @endforeach
        </tbody>
        @endforeach

          <tr> 
              <td class="km" colspan="1"></td> 
              <td class="km" colspan="2"><br><br><br><br>__________________________<br>{{ $admin->name }}<br><b>Admr. del Sistema Web de Infraestructura</b>
              </td>
              
          </tr> 
          <tr> 
              <td class="km" colspan="3"></td> 

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



               