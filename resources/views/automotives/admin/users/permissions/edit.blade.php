@extends('automotives.layout')

@section('content')
 
	<div class="row"> 
        <div class="col-md-6"> 
        	<div class="box box-info"> 
	            <div class="box-header with-border">
	              	<center>
	              		<h3 class="box-title"> <b>EDITAR PERMISO</b> </h3>
	          		</center>
	            </div>  
	            <div class="box-body">         
	            <!-- form start -->
	             
	            <form method="POST" action="{{ route('permissions.update',$permission) }}" >
	            	 
	            	 {{ method_field('PUT') }}
					
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Identificador:</label> 
						<input value="{{ $permission->name }}" class="form-control" disabled>
					</div>

					<div class="form-group">
						<label for="display_name">Nombre:</label> 
						<input name="display_name" value="{{ old('display_name', $permission->display_name) }}" class="form-control">
					</div>

				    {{-- @include('automotives.admin.users.roles.forms')  --}}

	                <button type="submit" class="btn btn-primary  btn-block" data-toggle="tooltip" >Crear Permiso</button>
	           	            
	            </form>
	            </div>
        	</div>
		</div>
	</div> 
@endsection


@push('styles')
  <link rel="stylesheet" href="/dashboard/plugins/select2/select2.min.css">
  <style>
      .box{
            font-family: "Times New Roman", Times, serif;
        }
  </style>
@endpush

@push('scripts') 
   <script src="/dashboard/plugins/select2/select2.full.min.js"></script>
<script>
//Date picker
    $(".select2").select2();
</script>
@endpush


