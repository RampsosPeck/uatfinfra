@extends('home')

@section('menu-messages')

	<!-- Esto es mensajes para el ADMINISTRADOR -->
	@include('automotives.admin.messages')
	@if (Auth::user()->active != "true")


	@endif

@endsection

@section('menu-notification')

	<!-- Esto es notificaciones para el ADMINISTRATOR -->
	@if (Auth::user()->active != "true")
		@include('automotives.admin.notification')
	@endif

@endsection

@section('menu-task')
	
	<!-- Esto es tareas para el ADMINISTRATOR -->
	
	@if (Auth::user()->active != "true")
		@include('automotives.admin.task')
	@endif

@endsection

@section('icon-sidebar')
	
	<!-- Esto es el icono del sidebar derecho para el ADMINISTRATOR -->
	@include('automotives.admin.iconsidebar')
	@if (Auth::user()->active != "true")

	@endif


@endsection

@section('sidebar-menu')

	<!-- Esto es el sidebar izquierdo para el ADMINISTRATOR -->
	@include('automotives.admin.sidebar')
	@if (Auth::user()->active != "true")    

	@endif
    
@endsection

@section('content-header')

	<!-- Esto es el contenido cabeza para el ADMINISTRATOR -->
	@include('automotives.admin.contentheader')
	@if (Auth::user()->active != "true")

	@endif

@endsection

@section('content') 
	<!-- Esto es el contenido para el ADMINISTRATOR -->
	@include('automotives.admin.content')
	@if (Auth::user()->active != "true")

	@endif

@endsection


@section('content-sidebar')

	<!-- Esto es el sidebar derecho para el ADMINISTRATOR -->
	@include('automotives.admin.contentsidebar')
	@if (Auth::user()->active != "true")

	@endif

@endsection



















