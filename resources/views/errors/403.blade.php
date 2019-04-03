@extends('automotives.layout')

@section('content') 
<div class="container bodys">
    <div id="clouds">
        <div class="cloud x1"></div>
        <div class="cloud x1_5"></div>
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
    </div>
    <div class='c'>
        <div class='_404'><font color="yellow"> 403 </font></div>
        <hr>
        <div class='_1'><font color="yellow"><i class="fa fa-warning"></i></font> Oops! Página no <br /> AUTORIZADA. <br /> <font color="red" >{{ $exception->getMessage() }}</font></div>
        
        <br />
        <a class='btn btn-info' href="{{ url()->previous() }} ">REGRESAR</a> 
    </div>
</div>
@endsection
 
@push('styles') 
{!! Html::style('/css/errors403.css') !!}
@endpush
 