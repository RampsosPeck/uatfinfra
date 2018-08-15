
<?php $user = Auth::user(); ?>
@if($user->type == "Conductor" && $user->position == "AUTOMOTORES")
 
 <div class="pull-right">
    <a href="{{ url('/logout') }}" 
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"
                 class="btn btn-xs btn-danger btn-flat">
        SALIR
    </a>

    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
 </div>

@else
	<a href="#" data-toggle="control-sidebar" class="btn btn-lg btn-success"><i class="fa fa-gears fa-spin fa-1x fa-fw" aria-hidden="true"></i></a>
@endif


