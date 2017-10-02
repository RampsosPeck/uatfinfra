@extends('automotives.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-info">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
           <table class="table table-responsive">
			<caption>Lista de usuarios</caption>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Cédula</th>
					<th>Celular</th>
					<th>Email</th>
					<th>Tipo</th>
					<th>Entidad</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->cedula }}</td>
					<td>{{ $user->celular }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->type }}</td>
					<td>{{ $user->entidad }}</td>
					<td>

						@canImpersonate($user->id)			
							<form action="{{ route('impersonations.store') }}" method="POST" accept-charset="utf-8">
								{{ csrf_field() }}
								<input type="hidden" name="user_id" value="{{ $user->id }}" >

								<button class="btn btn-info btn-xs ">Personificar</button>
							</form>
						@endcanImpersonate

					</td>
				</tr>
				@endforeach
			</tbody>
		</table></div>
            </div>
        </div>
    </div>
</div>
@endsection