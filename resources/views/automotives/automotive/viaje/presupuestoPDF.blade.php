<?php
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Presupuesto de Viaje</title>
    {!! Html::style('css/presupuestoPdf.css') !!}
</head><br><br><br><br><br><br>
<body>
  <!--<div style="background-color:#e0e0e0;" >-->
  <div style="background: url(/img/dimension.png);" >
    <img style="float:right;" src="img/presupuesto.jpg" width="41px"/>
    <h1>
        <center>
        <b>PRESUPUESTO DE VIAJE </b><br>
        </center> 
    </h1>
    <center><font color="#337ab7;">Sistema Web Departamento de Infraestructura</font></center>
  </div>
<main>
<table border="1" >
    <tr>
        <td class="preti" colspan="5"><strong><center>VIAJE ({{ $viaje->tipo }})</center></strong></td>
        <td class="preti" colspan="1"><strong><center>Ruta</center></strong></td>
        <td class="preti" colspan="1"><strong><center>KM</center></strong></td>
    </tr>
    <tr>
    <td rowspan="3" style="font-size:90%;"> <center><strong>Viaje</strong><br /> N° {{$viaje->id}}</center> </td>

        <td rowspan="3" colspan="4" style="font-size:90%;"><strong>Vehículo: </strong>{{ $viaje->vehiculo->tipo }} {{ $viaje->vehiculo->placa }}<br/>
                                    <strong>Chofer: </strong> @foreach ($viaje->conductores as $conductor)
                                                                {{ $conductor->name }}.
                                                            @endforeach <br/>
                                    <strong> Responsable:</strong> {{ $viaje->encargado->name }}<br />
                <td class="kn" colspan="1">{{ $destino1->dep_inicio }} {{ $destino1->origen }} HASTA {{ $destino1->dep_final }} {{ $destino1->destino }}</td>
                <td class="km" colspan="1">{{ $ruta->kilo1 }} </td>
        </td>
    </tr>
    <tr>
        <td class="kn" colspan="1"> {{ $destino2->dep_inicio }} {{ $destino2->origen }} HASTA {{ $destino2->dep_final }} {{ $destino2->destino }} </td>
        <td class="km" colspan="1"> {{$ruta->kilo2}}</td>
    </tr>
    <tr>
        @if(empty($destino3))
        <td class="kn" colspan="1"> {{ $destino3->dep_inicio }} {{ $destino3->origen }} HASTA {{ $destino3->dep_final }} {{ $destino3->destino }}</td>
        <td class="km" colspan="1"> {{$ruta->kilo3}}</td>
        @else
        <td class="kn" colspan="1"> </td>
        <td class="km" colspan="1"> </td>
        @endif
    </tr>
    <tr>
        <td class="kn" rowspan="2"> <strong><center>CANT.</center></strong></td>
        <td class="kn" rowspan="2" colspan="1"> <strong><center>UNIDAD</center></strong></td>
        <td class="kn" rowspan="2" colspan="1"> <strong><center>DESCRIPCIÓN</center></strong></td>
        <td class="kn" rowspan="2" colspan="1"><strong><center>p/u Bs.</center></strong></td>
        <td class="kn" rowspan="2" colspan="1"> <strong><center>TOTAL Bs.</center></strong></td>
        @if(empty($destino4))
        <td class="kn" colspan="1"> {{ $destino4->dep_inicio }} {{ $destino4->origen }} HASTA {{ $destino4->dep_final }} {{ $destino4->destino }}</td>
        <td class="km" colspan="1">{{$ruta->kilo4}} </td>
        @else
        <td class="kn" colspan="1"> </td>
        <td class="km" colspan="1"> </td>
        @endif
    </tr>
    <tr>
        @if(empty($destino5))
        <td colspan="1" class="kn"> {{ $destino5->dep_inicio }} {{ $destino5->origen }} HASTA {{ $destino5->dep_final }} {{ $destino5->destino }}</td>
        <td  colspan="1" class="km">{{$ruta->kilo5}} </td>
        @else
        <td class="kn" colspan="1"> </td>
        <td class="km" colspan="1"> </td>
        @endif
    </tr>
    <tr><?php $totalcombu = $presupuesto->totalcombu;
              $combulitros= number_format($totalcombu, 2, '.', ',');?>
        <td class="km" colspan="1">{{ $combulitros }} </td>
        <td colspan="1" class="kn"> Litros</td>
        <?php $tipocombu = $presupuesto->combustible;?>
        @if ( $tipocombu == '6')
            <td colspan="1" class="kn"> Gasolina</td>
        @else
            <td colspan="1" class="kn"> Diesel</td>
        @endif
        <?php $premoney = $presupuesto->precio;
              $precombu = number_format($premoney, 2, '.', ',');?>
        <td class="km" colspan="1">{{ $precombu }} </td>
        <td class="km" colspan="1">  {{$presupuesto->totalprecio}}</td>
        @if(empty($destino6))
        <td colspan="1" class="kn"> {{ $destino6->dep_inicio }} {{ $destino6->origen }} HASTA {{ $destino6->dep_final }} {{ $destino6->destino }}</td>
        <td colspan="1" class="km" >{{$ruta->kilo6}}</td>
        @else
        <td class="kn" colspan="1"> </td>
        <td class="km" colspan="1"> </td>
        @endif
    </tr>
    <tr>
        <td class="km" colspan="1"> {{$presupuesto->canviaciu}}</td>
        <td colspan="1" class="kn"> día</td>
        <td colspan="1" class="kn"> Viáticos Ciudad</td>
        <?php $vc  = $presupuesto->previaciu;
            if ($vc == "") {$rv = 0;} else { $rv = $vc;}?>
        <td class="km" colspan="1"> {{number_format($rv, 2, '.', ',')}}</td>
        <td class="km" colspan="1"> {{$presupuesto->totviaciu}}</td>
        <td class="kn" colspan="1"> <b>RECORRIDO ADICIONAL</b></td>
        <td class="km" colspan="1"> {{ $ruta->adicional }}</td>
    </tr>
    <tr>
        <td class="km" colspan="1"> {{$presupuesto->canviapro}}</td>
        <td colspan="1" class="kn"> día</td>
        <td colspan="1" class="kn"> Viáticos Província</td>
        <?php $vp  = $presupuesto->previapro;
            if ($vp == "") {$rv1 = 0;} else { $rv1 = $vp;}?>
        <td class="km" colspan="1"> {{number_format($rv1, 2, '.', ',')}}</td>
        <td class="km" colspan="1"> {{$presupuesto->totviapro}}</td>
        <td class="km" colspan="2"> <b>RECORRIDO TOTAL: {{ $ruta->totalkm }} Km.</b></td>

    </tr>
    <tr>
        <td class="km" colspan="1"> {{$presupuesto->canviafro}}</td>
        <td colspan="1" class="kn"> día</td>
        <td colspan="1" class="kn"> Viáticos Frontera</td>
        <?php $vf  = $presupuesto->canviafro;
        if ($vf == "") {$rv2 = 0;} else { $rv2 = $vf;}?>
        <td class="km" colspan="1"> {{number_format($rv2, 2, '.', ',')}}</td>
        <td class="km" colspan="1"> {{$presupuesto->totviafro}}</td>
        <td colspan="2" class="km"> <center><b>COMBUSTIBLE</b></center> </td>
    </tr>
    <tr>
        <td class="km" colspan="1"> {{number_format($presupuesto->canpeaje, 2, '.', ',')}}</td>
        <td colspan="1" class="kn"> Global</td>
        <td colspan="1" class="kn"> Peajes ida y vuelta</td>
        <td class="km" colspan="1"> {{number_format($presupuesto->prepeaje, 2, '.', ',')}}</td>
        <td class="km" colspan="1"> {{$presupuesto->totpeaje}}</td>
        <td colspan="1" class="km"> <center><u><strong>Combustible</strong></u></center></td>
        <td class="km" colspan="1"> <u><strong>{{$presupuesto->totalcombu}} L.</strong></u></td>
    </tr>
    <tr> 
        <?php $canman  = $presupuesto->canmante;
        if ($canman == "") {$cm = 0;} else { $cm = $canman;}?>
        <td class="km" colspan="1"> {{number_format($cm, 2, '.', ',')}}</td>
        <td colspan="1" class="kn"> Global</td>
        <?php $nomman  = $presupuesto->nommante;
        if ($nomman == null) {$nm = "mantenimiento";} else { $nm = $nomman;}?>
        <td colspan="1" class="kn"> {{ $nm }}</td>
        <?php $preman  = $presupuesto->premante;
        if ($preman == "") {$pm = 0;} else { $pm = $preman;}?>
        <td class="km" colspan="1"> {{number_format($pm, 2, '.', ',')}}</td>
        <td class="km" colspan="1"> {{$presupuesto->totmante}}</td>
        <td colspan="1" class="kn"> Con Pedido</td>
        <td class="km" colspan="1"> 0</td>
    </tr>
    <tr>
        <?php $cg    = $presupuesto->cangaraje;
        if ($cg == "") {$cangar = 0;} else { $cangar = $cg;}?>
        <td class="km" colspan="1"> {{number_format($cangar, 2, '.', ',')}}</td>
        <td colspan="1" class="kn"> Global</td>
        <td colspan="1" class="kn"> Garaje</td>
        <?php $pg  = $presupuesto->pregaraje;
        if ($pg == "") {$pregar = 0;} else { $pregar = $pg;}?>
        <td class="km" colspan="1"> {{number_format($pregar, 2, '.', ',')}}</td>
        <td class="km" colspan="1"> {{$presupuesto->totgaraje}}</td>
        <td colspan="1" class="kn"> Con Carta</td>
        <td class="km" colspan="1"> {{$presupuesto->totalcombu}}</td>
    </tr>
    <tr>
        <td colspan="4" class="km"><b>TOTAL (a) bs.</b></td>
        <td class="km" colspan="1"><b>{{$presupuesto->totprebol}}</b></td>
        <td colspan="2" class="km"><b> COMBUSTIBLE TOTAL: {{$presupuesto->totalcombu}} Litros.</b></td>

    </tr>
    <tr>
        <td class="km" colspan="1"> {{$presupuesto->cantidad1}}</td>
        <td colspan="1" class="kn"> Pasaje</td>
        <td colspan="1" class="kn"> {{$presupuesto->ruta1}}</td>
        <td class="km" colspan="1"> {{$presupuesto->precio1}}</td>
        <td class="km" colspan="1"> {{$presupuesto->total1}}</td>
        <td colspan="2" class="kn"> Viaje de: {{$viaje->dias}} desde el: {{ Carbon::parse($viaje->fecha_inicial)->format('d-m-Y')}} hasta el: {{ Carbon::parse($viaje->fecha_final)->format('d-m-Y')}}</td>
    </tr>
    <tr>
        <td class="km" colspan="1"> {{$presupuesto->cantidad2}}</td>
        <td colspan="1" class="kn"> Pasaje</td>
        <td class="kn" colspan="1"> {{$presupuesto->ruta2}}</td>
        <td class="km" colspan="1"> {{$presupuesto->precio2}}</td>
        <td class="km" colspan="1"> {{$presupuesto->total2}}</td>
        <td class="kn" colspan="1"> Fecha de solicitud en S.A.</td>
        <td class="kn" colspan="1"> {{ Carbon::parse($viaje->created_at)->format('Y-m-d') }}</td>
    </tr>
    <tr>
        <td class="km" colspan="1"> {{ $presupuesto->vueltas }}</td>
        <td colspan="1" class="kn"> Global</td>
        <td colspan="1" class="kn"> Flete por transporte</td>
        <td class="km" colspan="1"> {{ $presupuesto->preciovuelta }}</td>
        <td class="km" colspan="1"> {{ $presupuesto->totalvuelta }}</td>
        <td colspan="1" class="kn"> Fecha de Viaje</td>
        <td colspan="1" class="kn"> {{ Carbon::parse($viaje->fecha_inicial)->format('Y-m-d') }}</td>
    </tr>
    <tr>
        <td class="km" colspan="4"><b>TOTAL (b) bs.</b></td>
        <td class="km" colspan="1"><b>{{$presupuesto->totalpublico}}</b></td>
        <td colspan="1" class="km"><b>DIFERENCIA (a) - (b)  Bs.</b></td>
        <td class="km" colspan="1"><b> {{$presupuesto->totaldiferencia}}</b></td>
    </tr>
</table>
</main>
<table border="1" >

        <tr>
            <td class="km" colspan="6"><CENTER><b>NOTA: {{ $viaje->nota }}</b></CENTER></td>
        </tr>
        <tr>
            <td class="kn" colspan="1"><b>Pasajeros:</b> {{$viaje->pasajeros }}</td>
            <?php $recurso = $viaje->recurso;
                if($recurso == "viajeuatf"){ $recurso = "UATF"; }else{ $recurso = "PROPIO"; } ?>
            <td class="kn" colspan="2"><b>Recurso:</b> {{ $recurso }}</td>
            <td class="kn" colspan="3"><b>Unidad/Sección:</b> {{ $viaje->entidad }}</td>
        </tr>
        <tr>
            <td class="kn" colspan="2"><b>Fecha de Partida:</b>{{ Carbon::parse($viaje->fecha_inicial)->format('Y-m-d')}}</td>
            <td class="kn" colspan="1"><b>Hora:</b> {{$viaje->horainicial}}</td>
            <td class="kn" colspan="2"><b>Fecha de Retorno:</b>{{ Carbon::parse($viaje->fecha_final)->format('Y-m-d')}}</td>
            <td class="kn" colspan="1"><b>Hora:</b> {{$viaje->horafinal}}</td>
        </tr>


    </table><br><br>
        <center><h4 >Sr. {{$supervisor->name}}<br />ENCARGADO DE AUTOMOTORES </h4></center>
    <footer>
        <center>Nuevo Sistema Web © 2017 Depto. INFRAESTRUCTURA</center>
    </footer>
</body>
</html>



