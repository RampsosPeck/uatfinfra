@extends('automotives.layout')

@section('content')
@include('alertas.success')

<div class="container">
  <div class=" col-md-11">
    
    <div class="box box-primary">      
      <div id="calendar"></div>
    </div>

  </div>  
</div>
		  
@endsection


@push('styles')
   {!! Html::style('/dashboard/plugins/fullcalendar/fullcalendar.min.css') !!}
   <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        }
  </style>
@endpush

@push('scripts') 
   {!! Html::script('/dashboard/plugins/daterangepicker/moment.js') !!}
   {!! Html::script('/dashboard/plugins/fullcalendar/fullcalendar.js') !!}
   {!! Html::script('/dashboard/plugins/fullcalendar/es.js') !!}


<script>
$(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    


    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
   
    $('#calendar').fullCalendar({
      lang: 'es',
      eventClick: function(calEvent, jsEvent, view) {

          alert('ENTIDAD: ' + calEvent.datos);
          // change the border color just for fun
          $(this).css('border-color', 'red');

      },
      //Cambia los colores del evento
      eventAfterRender: function (event, element, view) {
          var dataHoje = new Date();
          //var estado = event.estado;
          //var cancelado =  "calcelado";
         //alert(cancelado);
          if (event.start < dataHoje && event.end > dataHoje) {
              //event.color = "#FFB347"; //En funcion
              if (event.estado == 'cancelado') {
                  //event.color = "#AEC6CF"; //Cancelado
                  element.css('background-color', '#FA5858');
              }else{
                  element.css('background-color', '#FFB347');
              }
          } else if (event.start < dataHoje && event.end < dataHoje) {
              //event.color = "#77DD77"; //Concluído OK
              if (event.estado == 'cancelado') {
                  //event.color = "#AEC6CF"; //Cancelado
                  element.css('background-color', '#FA5858');
              }else{
                  element.css('background-color', '#77DD77');
              }
          } else if (event.start > dataHoje && event.end > dataHoje) {
              //event.color = "#AEC6CF"; //No iniciado
              if (event.estado == 'cancelado') {
                  //event.color = "#AEC6CF"; //Cancelado
                  element.css('background-color', '#FA5858');
              }else{
                  element.css('background-color', '#88BAF9');
              }    
          }
      },
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'HOY',
        month: 'MES',
        week : 'SEMANA',
        day  : 'DÍA'
      },
      //Random default events
      events    :[
        //url:'events'
          @foreach($viajes as $viaje)
          {
              title : 'CONDUCTOR: @foreach ($viaje->conductores as $conductor){{ $conductor->name }} | @endforeach',
              start : '{{ $viaje->fecha_inicial}}',
              end   : '{{ $viaje->fecha_final2}}',
              estado: '{{ $viaje->estado}}',
              datos : '{{ $viaje->entidad }} DESDE: {{ $viaje->horainicial }} HASTA: {{ $viaje->horafinal }} VEHÍCULO: {{ $viaje->vehiculo->placa }} ESTADO: {{ $viaje->estado }}',
              url   : '{{ route('calendario.show', $viaje->id) }}'
          },
          @endforeach
      ],
      editable  : false,
      droppable : false, // this allows things to be dropped onto the calendar !!!
      
    })
  })
</script>
    
@endpush