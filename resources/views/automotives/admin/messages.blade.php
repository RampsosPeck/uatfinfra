<!-- Menu toggle button -->
<a href="{{ route('notifications.index') }}" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-envelope-o"></i>
    @if($count = Auth::user()->unreadNotifications->count())
      <span class="label label-success">
        {{ $count }}
      </span>
    @endif
</a>
<ul class="dropdown-menu">
  <!--<a href="{{ route('notifications.index') }}" >
    <li class="header text-center" style="background-color:#dff0d8;">Tienes {{ $count }} mensajes</li>
  </a>
  <li>
     inner menu: contains the messages  
    <ul class="menu">
      <li>  start message 
        <a href="#">
          <div class="pull-left">
                User Image 
            <img src="/dashboard/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
              Message title and timestamp  
          <h4>
            Encargado de automotores
            <small><i class="fa fa-clock-o"></i> 5 mins</small>
          </h4>
              The message  
          <p>Tienes que realizar el informe del viaje a Tupiza</p>
        </a>
      </li>
         end message  
    </ul>
       /.menu 
  </li> -->
  <li class="text-center" ><a href="{{ route('notifications.index') }}" style="background-color:rgba(0, 186, 101, 0.6);"> <i class="fa fa-comments-o fa-2x" aria-hidden="true"></i> Ver Todos los mensajes</a></li>
</ul> 