<!-- Esto es para el ADMINISTRADOR -->
@if (Auth::user()->type === "Administrator")

        @include('automotives.admin.dashboard')

@endif

<!-- Esto es para el JEFE -->
@if (Auth::user()->type === "Boss")

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el ENCARGADO -->
@if (Auth::user()->type === "Supervisor")  

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el CONDUCTOR -->
@if (Auth::user()->type === "Driver")

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el MECANICO -->
@if (Auth::user()->type === "Mechanic")

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el MENSAJERO -->
@if (Auth::user()->type === "Message")

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el DEFAULT -->
@if (Auth::user()->type === "Default")

        @include('automotives.automotive.dashboard')

@endif
