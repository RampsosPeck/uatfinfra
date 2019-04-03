@extends('automotives.layout')

@section('content')
<div class="row">  
    <div class="col-md-4 ">
        <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ $user->avatar }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email:</b> <a class="pull-right">{{ $user->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Cédula:</b> <a class="pull-right">{{ $user->cedula }}</a>
                </li>
                <li class="list-group-item">
                  <b>Celular:</b> <a class="pull-right">{{ $user->celular }}</a>
                </li>
              </ul>

              <a href="{{ route('users.edit',$user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <center><h3 class="box-title"><b> Roles del Usuario </b></h3></center>
                </div>
                <div class="box-body">
                @forelse($user->roles as $role)
                    <strong>{{ $role->name }}</strong>  
                    @if($role->permissions->count())
                        <br>
                        <small class="text-muted">Permisos: {{ $role->permissions->pluck('name')->implode(', ') }}</small>
                    @endif
                    @unless($loop->last)
                        <hr>
                    @endunless
                @empty
                    <small class="text-muted">No tiene ningún rol asignado</small>
                @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <center><h3 class="box-title"><b> Permisos adicionales </b></h3></center>
                </div>
                <div class="box-body">
                @forelse($user->permissions as $permission)
                    <strong>{{ $permission->name }}</strong>  
                     
                    @unless($loop->last)
                        <hr>
                    @endunless
                @empty
                    <small class="text-muted">No tiene permisos adicionales</small>
                @endforelse
                </div>
            </div>
        </div>
</div>
@endsection

@push('styles') 
  <style>
      .box{
            font-family: "Times New Roman", Times, serif;
        }
    table th{
        text-align: center;
    }
  </style>
@endpush
 
