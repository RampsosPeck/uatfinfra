@extends('home')

@section('menu-messages')

	<!-- Esto es mensajes para el ADMINISTRADOR -->
	@if (Auth::user()->type === "Administrator")

	        @include('automotives.admin.messages')

	@endif

@endsection

@section('menu-notification')

	<!-- Esto es notificaciones para el ADMINISTRATOR -->
	@if (Auth::user()->type === "Administrator")

	        @include('automotives.admin.notification')

	@endif

@endsection

@section('menu-task')
	
	<!-- Esto es tareas para el ADMINISTRATOR -->
	@if (Auth::user()->type === "Administrator")

	        @include('automotives.admin.task')

	@endif

@endsection

@section('icon-sidebar')
	
	<!-- Esto es el icono del sidebar derecho para el ADMINISTRATOR -->
	@if (Auth::user()->type === "Administrator")

	        @include('automotives.admin.iconsidebar')

	@endif


@endsection

@section('sidebar-menu')

	<!-- Esto es el sidebar izquierdo para el ADMINISTRATOR -->
	@if (Auth::user()->type === "Administrator")

	        @include('automotives.admin.sidebar')

	@endif
    
@endsection

@section('content-header')

	<!-- Esto es el contenido cabeza para el ADMINISTRATOR -->
	@if (Auth::user()->type === "Administrator")

	        @include('automotives.admin.contentheader')

	@endif

@endsection

@section('content')
	
	@if (session()->has('flash'))
	   <div class="alert alert-success">{{ session('flash') }} </div>
	@endif
	
	<!-- Esto es el contenido para el ADMINISTRATOR -->
	@if (Auth::user()->type === "Administrator")

	        @include('automotives.admin.content')

	@endif

@endsection


@section('content-sidebar')

	<!-- Esto es el sidebar derecho para el ADMINISTRATOR -->
	@if (Auth::user()->type === "Administrator")

	        @include('automotives.admin.contentsidebar')

	@endif

@endsection



















