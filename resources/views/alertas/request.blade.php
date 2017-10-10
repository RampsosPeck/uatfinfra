@if(count($errors) > 0)
	<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Por favor corrige los siguientes errores:</strong>
  		<ul>
  			@foreach($errors->all() as $error)
  				&#160;&#160;&#160;&#160;&#160;&#160;&#160;■&#160;&#160;{!!$error!!}
  			@endforeach
  		</ul>
  	</div>
@endif