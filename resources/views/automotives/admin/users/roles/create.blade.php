@extends('automotives.layout')

@section('content')
 
	<div class="row"> 
        <div class="col-md-6"> 
        	<div class="box box-info"> 
	            <div class="box-header with-border">
	              	<center>
	              		<h3 class="box-title"> <b>CREAR ROL</b> </h3>
	          		</center>
	            </div>  
	            <div class="box-body">         
	            <!-- form start -->
	            {!! Form::open(['route'=>'roless.store','method'=>'POST']) !!}
	            	 
					@include('automotives.admin.users.roles.forms')
					
	                <button type="submit" class="btn btn-primary  btn-block" data-toggle="tooltip" >Crear Rol</button>
	             
	            {!! Form::close() !!}
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


