@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container" ><br>
    <div class="panel panel-info">
        <div class="panel-heading text-center"><h4><p class="www">GRÁFICA DE COMBUSTIBLES</p></h4></div>
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
            alpha: 15,
            beta: 16,
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
      text: 'GRÁFICA DE COMBUSTIBLES SECCIÓN AUTOTRANSPORTE',
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
        name: 'Gasolina',
        data: [92, 76, 88, 125, 140, 155, 103, 57, 89, 166, 197, 110]
    }, {
        type: 'column',
        name: 'Gnv',
        data: [50, 88, 99, 77, 95, 66, 85, 74, 66, 154, 169, 98]
    }, {
        type: 'column',
        name: 'Diesel',
        data: [125, 115, 135, 145, 165, 177, 111, 98, 104, 198, 215, 125]
    }, {
        type: 'spline',
        name: 'Pasado Año (Diesel)',
        data: [110, 90, 95, 115, 155, 80, 125, 70, 81, 155, 130, 111],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[8],
            fillColor: 'red'
        }
    }, {
        type: 'pie',
        name: 'Total consumption',
        data: [{
            name: 'Gasolina',
            y: 30,
            color: Highcharts.getOptions().colors[0] // Jane's color
        }, {
            name: 'Diesel',
            y: 50,
            color: Highcharts.getOptions().colors[1] // John's color
        }, {
            name: 'Gnv',
            y: 10,
            color: Highcharts.getOptions().colors[2] // Joe's color
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
