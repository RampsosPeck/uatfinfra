<?php 
use Infraestructura\Vehiculo;?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pedido de Material</title> 
	{!! Html::style('css/pedido.css') !!}
</head>
<body>
   
<main>

<table  style="border-width"> 
	<tr>
		<td id="ver2" >NOTA DE ESPACIO</td>
	</tr>
	<tr>
		<td id="ver2" >NOTA DE ESPACIO</td>
	</tr>
	<tr>
		<td id="ver2" >NOTA DE ESPACIO</td>
	</tr> 
	<tr>
		<td id="ver2" >NOTA DE ESPACIO</td>
	</tr>
    <tr>
        <td id="ver3" rowspan="2" colspan="12"><b id="ver2" >NOTA DE ESPACIO NOTA DE ESPACIO..........</b> DEPARTAMENTO DE INFRAESTRUCTURA<br><br> <a id="ver2" >>NOTA DE ESPACIO >NOTA DE ESPACIO </a> <font style="text-transform: uppercase;">

          &nbsp;&nbsp;&nbsp;
          @php if($pedido->idh == "SI"){$idh = 'IDH';} @endphp
          {{ $solicitud->vehiculo->tipo }} &nbsp;&nbsp;&nbsp;{{ $solicitud->vehiculo->placa }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$idh}}</font>  <br><br>
        <td id="ver2" colspan="2"> NOTA DE ESPACIO </td>
        <td id="ver2" colspan="2"> <b>>NOTA DE ESPACIO</b></td>
        </td>
    </tr>
    <tr>
        <td colspan="1"> </td>
        <td colspan="1"> </td>
        <td colspan="1"> </td>
        <td colspan="1"> </td>
    </tr>
    <tr>
    
        <td id="cen1" colspan="1"> <b>Cant. <br> Pedida</b></td>
        <td id="cen1" colspan="1"> <b>Unid. de <br> Medida</b></td>
        <td id="cen1" colspan="10"> <b>___________D E S C R I P C I O N_____________</b></td>
        <td id="cen1" colspan="1"> <b>Cant. <br> Aprob</b></td>
        <td id="cen1" colspan="1"> <b>Cant. <br> Entreg.</b></td>
        <td id="cen1" colspan="1"> <b>Código <br> Presup.</b></td>
        <td id="cen1" colspan="1"> <b>Código <br> Materiales</b></td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant1}}</td>
        <?php $med11 = strtoupper($pedido->med1);  ?>
        <td id="vero" colspan="1"> {{ $med11 }}</td>
        <?php $str = strtoupper($pedido->des1);  ?>
        <td id="veros" colspan="10"> {{$str}}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant2}}</td>
        <?php $med22 = strtoupper($pedido->med2);  ?>
        <td id="vero" colspan="1"> {{$med22}}</td>
         <?php $str2 = strtoupper($pedido->des2); ?>
        <td id="veros" colspan="10"> {{$str2 }}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant3}}</td>
        <?php $med33 = strtoupper($pedido->med3);  ?>
        <td id="vero" colspan="1"> {{$med33}}</td>
        <?php $str3 = strtoupper($pedido->des3); ?>
        <td id="veros" colspan="10"> {{$str3 }}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant4}}</td>
        <?php $med44 = strtoupper($pedido->med4);  ?>
        <td id="vero" colspan="1"> {{$med44}}</td>
            <?php $str4 = strtoupper($pedido->des4); ?>
        <td id="veros" colspan="10"> {{$str4}}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant5}}</td>
        <?php $med55 = strtoupper($pedido->med5);  ?>
        <td id="vero" colspan="1"> {{$med55}}</td>
        <?php $str5 = strtoupper($pedido->des5); ?>
        <td id="veros" colspan="10"> {{$str5}}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant6}}</td>
        <?php $med66 = strtoupper($pedido->med6);  ?>
        <td id="vero" colspan="1"> {{$med66}}</td>
        <?php $str6 = strtoupper($pedido->des6); ?>
        <td id="veros" colspan="10"> {{$str6}}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant7}}</td>
        <?php $med77 = strtoupper($pedido->med7);  ?>
        <td id="vero" colspan="1"> {{$med77}}</td>
            <?php $str7 = strtoupper($pedido->des7); ?>
        <td id="veros" colspan="10"> {{$str7}}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant8}}</td>
        <?php $med88 = strtoupper($pedido->med8);  ?>
        <td id="vero" colspan="1"> {{$med88}}</td>
            <?php $str8 = strtoupper($pedido->des8); ?>
        <td id="veros" colspan="10"> {{$str8}}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant9}}</td>
        <?php $med99 = strtoupper($pedido->med9);  ?>
        <td id="vero" colspan="1"> {{$med99}}</td>
            <?php $str9 = strtoupper($pedido->des9); ?>
        <td id="veros" colspan="10"> {{$str9}}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant10}}</td>
        <?php $med101 = strtoupper($pedido->med10);  ?>
        <td id="vero" colspan="1"> {{$med101}}</td>
            <?php $str10 = strtoupper($pedido->des10); ?>
        <td id="veros" colspan="10"> {{$str10}}</td>
       <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> {{$pedido->cant11}}</td>
        <?php $med111 = strtoupper($pedido->med11);  ?>
        <td id="vero" colspan="1"> {{$med111}}</td>
            <?php $str11 = strtoupper($pedido->des11); ?>
        <td id="veros" colspan="10"> {{$str11}}</td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
        <td id="ver4"colspan="1">l </td>
    </tr>
    <tr> 
        <td id="ver2" colspan="4"><b><br> <br>Aprobado Director <br> admonistrativo y Financiero</b> </td>
        <td id="ver2" colspan="5"><b><br> <br>ENTREGADO POR:</b></td>
        <td id="ver2" colspan="3"><b><br> <br>RECIBIDO POR:</b></td>
    </tr>
    <tr>
        <td id="cen2" colspan="4"><br><br>{{ $jefe->name }} <br>JEFE DE DIVF <b>Cod. {{$pedido->pedicodi}}</b><br></td>
        <td colspan="4"><br> <br> <br><br></td>
        <td colspan="5"><br> <br> <br><br></td>
        <td id="cen2"  colspan="3"><br> <br>{{ $meca->name }}<br>MEC. AUTOMOTRIZ <br></td>
    </tr>
    <tr>
        <td id="ver" colspan="1"> </td>
        <td id="veris"> <b>{{$d}}</b>  </td>
        <td id="verisa" colspan="1"><b>{{$m}}</b></td>
        <td id="veris" colspan="1"><b>{{$y}}</b> </td>
        <td id="ver1" colspan="1"><b>FECHA:</b></td>
        <td colspan="1"> </td>
        <td colspan="1"> </td>
        <td colspan="1"> </td>
        <td id="ver1" colspan="1"><b>FECHA:</b></td>
        <td colspan="1"> </td>
        <td colspan="1"> </td>
        <td colspan="1"> </td>
        <td id="ver1" colspan="1"><b>FECHA:</b></td>
        <td colspan="1"> </td>
        <td colspan="1"> </td>
        <td colspan="1"> </td>
    </tr>    
</table>
<p id="cen3"> </p>
</main>
        
</body>
</html>