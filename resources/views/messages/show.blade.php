@extends('automotives.layout')

@section('content')
@include('alertas.success')
@include('alertas.errors')
<div class="container">
     <h1>Mensaje</h1>
     <p>{{ $message->body }}</p> 
</div>
@endsection

 