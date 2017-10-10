@if(Session::has('message-error'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <center>{{Session::get('message-error')}}</center>
</div>
@endif