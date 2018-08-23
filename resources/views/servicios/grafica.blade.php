@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container" ><br>
    <div class="panel panel-info">
        <div class="panel-heading text-center"><h4><p class="www">REPORTE DE TRABAJOS - SERVICIOS GENERALES</p></h4></div>
            <div id="container" style="min-width: 350px; height: 480px; margin: 0 auto"></div>
            <div id="sliders">
                <table>
                    <tr>
                      <td>Ángulo Alfa</td>
                      <td><input id="alpha" type="range" min="0" max="45" value="15"/> <span id="alpha-value" class="value"></span></td>
                    </tr>
                    <tr>
                      <td>Ángulo Beta</td>
                      <td><input id="beta" type="range" min="-45" max="45" value="16"/> <span id="beta-value" class="value"></span></td>
                    </tr>
                    <tr>
                      <td>Profundidad</td>
                      <td><input id="depth" type="range" min="20" max="100" value="100"/> <span id="depth-value" class="value"></span></td>
                    </tr>
                </table>
            </div>
    </div>
    <!-- //temperature = Pasado Año
        //Rainfall    = Presente Año

        data: [5, 15, 20, 40, 55, 35, 20, 15, 33, 40, 68, 20],

        data: [7, 6, 9, 14, 18, 21, 32, 26, 23, 18, 13, 9],
    -->
</div>
@endsection

@push('styles')  
   <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
    table th{
        text-align: center;
    } 
    .highcharts-grid-line {
          fill: none;
          stroke: #bce8f1;
        }
    .highcharts-color-2 {
        fill: rgb(105,205,75); 
      }
    .highcharts-color-1 {
        fill: rgb(255,111,52); 
      }
    .highcharts-color-0{
        fill: rgb(30,166,224);
    }
    .highcharts-background{
      fill: "url(#highcharts-ehnarxc-1)"
      ;
    }

  </style>
@endpush

@push('scripts')  
    {!! Html::script('report/code/highcharts.js') !!}
    {!! Html::script('report/code/highcharts-3d.js') !!}
    {!! Html::script('report/code/modules/exporting.js') !!}
    {!! Html::script('report/code/modules/export-data.js') !!}

<script>

var chart = new Highcharts.chart('container', {
    colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', 
             '#FF9655', '#FFF263', '#6AF9C4'],
    chart: {
        renderTo: 'container',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 0,
            beta: 0,
            depth: 100,
            viewDistance: 65
        },
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(240, 240, 255)']
            ]
        },
    },
    title: {
        text: 'UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS ',
        style: {
              color: '#1A1A1A',
              font: 'bold 17px "Times New Roman", Times, serif'
          }
    },
    subtitle: {
      text: 'GRÁFICA DE TRABAJOS REALIZADOS EN SERVICIOS GENERALES',
      style: {
              color: '#666666',
              font: 'bold 15px "Times New Roman", Times, serif'
          }
    },
    xAxis: {
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Augosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre']
    },
    labels: {
        items: [{
            html: 'Gráfica Total',
            style: {
                left: '-10px',
                top: '-10px',
                color: (Highcharts.theme && Highcharts.theme.textColor) || '<b>black</b>'
            }
        }]
    },

    plotOptions: {
        column: {
            depth: 25
        }
    },
    series: [{
        type: 'column',
        name: 'Carpintería',
        data: [4, 7, 9, 12, 18, 25, 15, 23, 25, 24, 29, 12],
        color: '#058dc7'
    }, {
        type: 'column',
        name: 'Eléctrico',
        data: [5, 8, 12, 19, 26, 32, 10, 13, 18, 26, 22, 20],
        color:'#50B432'
    }, {
        type: 'column',
        name: 'Jardinería',
        data: [3, 6, 11, 16, 19, 23, 20, 21, 28, 23, 25, 22],
        color:'#ED561B'
    }, {
        type: 'column',
        name: 'ManGeneral',
        data: [6, 9, 14, 19, 28, 25, 21, 15, 21, 28, 23, 23],
        color:'#DDDF00'
    }, {
        type: 'column',
        name: 'MecGeneral',
        data: [3, 10, 15, 19, 25, 21, 25, 20, 25, 28, 23, 21],
        color:'#24CBE5'
    }, {
        type: 'column',
        name: 'Albañilería',
        data: [3, 5, 9, 12, 16, 17, 19, 18, 23, 17, 25, 21],
        color: '#FF9655'
    }, {
        type: 'column',
        name: 'Plomería',
        data: [5, 8, 11, 14, 19, 22, 25, 15, 18, 23, 20, 10],
        color: '#FFF263'
    }, {
        type: 'column',
        name: 'ServGeneral',
        data: [2, 8, 11, 15, 19, 25, 28, 30, 31, 25, 20, 15],
        color: '#6AF9C4',
    }, {
        type: 'spline',
        name: 'Total trabajos/Pasado año',
        data: [4, 6, 13, 18, 25, 29, 25, 19, 25, 32, 31, 12],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[8],
            fillColor: 'black'
        }
    }, {
        type: 'pie',
        name: 'Total consumption',
        data: [{
            name: 'Carpintería',
            y: 35,
            color: Highcharts.getOptions().colors[0] // Jane's color
        }, {
            name: 'Eléctrico',
            y: 41,
            color: Highcharts.getOptions().colors[2] // Joe's color
        }, {
            name: 'Jardinería',
            y: 18,
            color: Highcharts.getOptions().colors[3] // Joe's color
        }, {
            name: 'ManGeneral',
            y: 30,
            color: Highcharts.getOptions().colors[4] // John's color
        }, {
            name: 'MecGeneral',
            y: 37,
            color: Highcharts.getOptions().colors[5] // John's color
        }, {
            name: 'Albañilería',
            y: 25,
            color: Highcharts.getOptions().colors[6] // John's color
        }, {
            name: 'Plomería',
            y: 19,
            color: Highcharts.getOptions().colors[7] // John's color
        }, {
            name: 'ServGeneral',
            y: 20,
            color: Highcharts.getOptions().colors[8] // John's color
        }],
        center: [30, 35],
        size: 100,
        showInLegend: false,
        dataLabels: {
            enabled: false
        }
    }]
});

function showValues() {
    $('#alpha-value').html(chart.options.chart.options3d.alpha);
    $('#beta-value').html(chart.options.chart.options3d.beta);
    $('#depth-value').html(chart.options.chart.options3d.depth);
}

// Activate the sliders
$('#sliders input').on('input change', function () {
    chart.options.chart.options3d[this.id] = parseFloat(this.value);
    showValues();
    chart.redraw(false);
});

showValues();

</script>
    
@endpush
