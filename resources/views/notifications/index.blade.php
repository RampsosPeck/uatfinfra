@extends('automotives.layout')

@section('content')
@include('alertas.success')
@include('alertas.errors')
<div class="container">
     <div class="row">
         <div class="col-md-6">
            <div class="panel panel-success">
              <div class="panel-heading text-center">MENSAJES NO LEIDOS</div>
              <div class="panel-body" ">
                    @foreach($unreadNotifications as $unreadNotification)  
                        <li class="list-group-item" style="background-color: #dff0d8;" >
                            <div class="form-group"> 
                                <a href="{{ $unreadNotification->data['link'] }}">
                                    {{ $unreadNotification->data['text'] }}
                                </a> 
                                <form method="POST" action="{{ route('notifications.read', $unreadNotification->id ) }}" class="pull-right">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Marcar como leido.">
                                       <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </li> 
                    @endforeach
              </div>
            </div>
         </div>
         <div class="col-md-6"> 
            <div class="panel panel-info">
              <div class="panel-heading text-center">MENSAJES LEIDOS</div>
              <div class="panel-body" ">
                    @foreach($readNotifications as $readNotification)  
                        <li class="list-group-item" style="background-color: #dff0d8;" >
                            <div class="form-group"> 
                                <a href="{{ $readNotification->data['link'] }}">
                                    {{ $readNotification->data['text'] }}
                                </a> 
                                <form  method="POST" action="{{ route('notifications.destroy', $readNotification->id) }}"  accept-charset="utf-8" class="pull-right">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar mensaje.">
                                       <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </li> 
                    @endforeach
              </div>
            </div>
         </div>
     </div>
</div>
@endsection

 @push('styles')
  <style>
      .container{
            font-family: "Times New Roman", Times, serif;
        } 
  </style>
@endpush

