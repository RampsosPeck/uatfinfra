@extends('automotives.layout') 

@section('content')
@include('alertas.success')
 
<div class="container">
    <div class="row login_box">
        <div class="col-md-12 col-xs-12" align="center">
            <div class="line"><h3><font color="#fed136">{{ date('m/d/y g:ia') }}</font></h3></div>
            <div class="outter">
                <img src="{{ Auth::user()->avatar }}" class="image-circle" />
            </div>   
            <h1> <font color="#fed136"> {{ Auth::user()->name }} </font></h1>
            <span> <b> <font color="yellow">{{ Auth::user()->entidad }}</font> </b> </span>
        </div>
        <div class="col-md-6 col-xs-6 follow line" align="center">
            <h3>
                <font color="#fed136"> Tipo </font> <br/> <span>{{ Auth::user()->type }}</span>
            </h3>
        </div>
        <div class="col-md-6 col-xs-6 follow line" align="center">
            <h3>
                <font color="#fed136"> Posición </font> <br/> <span>{{ Auth::user()->position }}</span>
            </h3>
        </div>
        
        <div class="col-md-12 col-xs-12 login_control">
                
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Cédula</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ Auth::user()->cedula }}" disabled />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Celular</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ Auth::user()->celular }}" disabled />
                    </div>
                  </div>
                </form>  
                
        </div>
        
        
            
    </div>
</div>
@endsection

 @push('styles')
   {!! Html::style('/css/perfil.css') !!}
    <style>
    
    </style>
@endpush

