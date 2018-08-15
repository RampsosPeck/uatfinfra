@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <center><b>{{Session::get('message')}}</b>&nbsp;&nbsp;&nbsp;<i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i></center>
</div>
@endif

@if(Session::has('mensaje-rol'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <center>{{Session::get('mensaje-rol')}}</center>
</div>
@endif