<!-- Menu toggle button -->
<a href="{{ route('notifications.index') }}" class="dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-envelope-o"></i>
  @if($count = Auth::user()->unreadNotifications->count())
    <span class="label label-success">{{ $count }}</span>
  @endif
</a>
<ul class="dropdown-menu" style="background-color:#c7f9ca;">
  <li class="header" style="background-color:#99f49e;">Tienes {{ $count }} mensajes</li>
  <li>
    <!-- inner menu: contains the messages -->
    <ul class="menu">
      <li><!-- start message -->
        <a href="{{ route('notifications.index') }}">
          <div class="pull-left">
            <!-- User Image -->
            <img src="/img/conductor.png" class="img-circle" alt="User Image">
          </div>
          <!-- Message title and timestamp -->
          <h4>
            Mensaje desde Web
            <small><i class="fa fa-clock-o"></i> 5 mins</small>
          </h4>
          <!-- The message -->
          <p>No recuerdo la clave de mi cuenta</p>
        </a>
      </li>
      <!-- end message -->
    </ul>
    <!-- /.menu -->
  </li>
  <li class="footer"><a href="#">Lista de Mensajes</a></li>
</ul>

 