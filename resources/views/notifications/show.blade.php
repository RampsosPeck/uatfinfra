@extends('automotives.layout')

@section('content')
@include('alertas.success')
@include('alertas.errors')
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h1> MENSAJE DE: {{ $message->name }}</h1>
                </div>
                <div class="panel-body" style="background-color: #bce8f1">
                	{!! $message->body !!}	
                </div>
                <div class="panel-footer" style="background-color: #d9edf7">
                	<b>Email:</b> {!! $message->email !!} <b class="pull-right">Celular:{!! $message->celular !!} </b>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

 