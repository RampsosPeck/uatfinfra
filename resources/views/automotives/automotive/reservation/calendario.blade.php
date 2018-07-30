@extends('automotives.layout')

@section('content')
@include('alertas.success')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-info" style="background-color:#E5F2FF"> 

          <center><h1><font color="#00c0ef"><b>CALENDARIO DE RESERVA DE VIAVES</b></font></h1> </center> 
          <button class="btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#myModalreserva"><i class="fa fa-plus"></i> Crear RESERVA</button>
            
            @include('automotives.automotive.reservation.create')<br /><br />   
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

          alert('Objetivo y Lugar: ' + calEvent.datos);
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
              title : 'ENTIDAD: {{ $viaje->entity }}',
              start : '{{ $viaje->startdate}}',
              end   : '{{ $viaje->enddate}}',
              datos : '{{ $viaje->objetive }}'
          },
          @endforeach
      ],
      editable  : false,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      
    })
  })
</script>
    
@endpush