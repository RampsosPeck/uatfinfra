@extends('automotives.layout')

@section('content')
@include('alertas.success')
<div class="container" ><br><br>
    <div class="panel panel-info">
        <div class="panel-heading text-center"><h4><p class="www">GRÁFICA DE VIAJES</p></h4></div>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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

  </style>
@endpush

@push('scripts')  
   {!! Html::script('report/code/highcharts.js') !!}
    {!! Html::script('report/code/modules/exporting.js') !!}
    {!! Html::script('report/code/modules/export-data.js') !!}

<script>

Highcharts.chart('container', {
    colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', 
             '#FF9655', '#FFF263', '#6AF9C4'],
  chart: {
     zoomType: 'xy',
     backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(240, 240, 255)']
            ]
        },
  },
  title: {
    text: 'UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS',
    style: {
              color: '#1A1A1A',
              font: 'bold 17px "Times New Roman", Times, serif'
          }
  },
  subtitle: {
    text: 'GRÁFICA DE VIAJES SECCIÓN AUTOTRANSPORTE',
    style: {
              color: '#666666',
              font: 'bold 15px "Times New Roman", Times, serif'
          }
  },
  xAxis: [{
    categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Augosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre'],
    crosshair: true,
    gridLineColor: '#707073',
    labels: {
        style: {
            color: '#1A1A1A'
        }
    },
    lineColor: '#707073',
    minorGridLineColor: '#505053',
    tickColor: '#707073',
    title: {
        style: {
            color: '#A0A0A3'

        }
    }
  }],
  yAxis: [{ // Primary yAxis
    opposite: true
  }, { // Secondary yAxis
    gridLineWidth: 0,
    title: {
      text: 'Presente Año',
      style: {
        color: Highcharts.getOptions().colors[0]
      }
    },
    labels: {
      format: '{value} Viajes',
      style: {
        color: Highcharts.getOptions().colors[0]
      }
    }
  }],
  tooltip: {
    shared: true
  },
  legend: {
    layout: 'vertical',
    align: 'left',
    x: 120,
    verticalAlign: 'top',
    y: 100,
    floating: true,
    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#bce8f1',
    itemStyle: {
            font: '9pt Trebuchet MS, Verdana, sans-serif',
            color: 'black'
        },
        itemHoverStyle:{
            color: 'gray'
        }
  },
  scrollbar: {
        barBackgroundColor: '#808083',
        barBorderColor: '#808083',
        buttonArrowColor: '#CCC',
        buttonBackgroundColor: '#606063',
        buttonBorderColor: '#606063',
        rifleColor: '#FFF',
        trackBackgroundColor: '#404043',
        trackBorderColor: '#404043'
    },

    // special colors for some of the
    legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
    background2: '#505053',
    dataLabelsColor: '#B0B0B3',
    textColor: '#C0C0C0',
    contrastTextColor: '#F0F0F3',
    maskColor: 'rgba(255,255,255,0.3)',

    series: [{
    name: 'Presente Año',
    type: 'column',
    yAxis: 1,
    data: [5, 15, 20, 40, 55, 35, 20, 15, 33, 40, 68, 20],
    tooltip: {
      valueSuffix: ' Viajes'
    }

  }, {
    name: 'Pasado Año',
    type: 'spline',
    data: [7, 6, 9, 14, 18, 21, 32, 26, 23, 18, 13, 9],
    tooltip: {
      valueSuffix: ' Viajes'
    },
    marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[2],
            fillColor: 'white'
        }
  }]

});
</script>
    
@endpush
