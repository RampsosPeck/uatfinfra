<!-- Esto es para el ADMINISTRADOR -->
@if (Auth::user()->type === "Administrator")

        @include('automotives.admin.dashboard')

@endif

<!-- Esto es para el JEFE -->
@if (Auth::user()->type === "Jefatura")

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el ENCARGADO -->
@if (Auth::user()->type === "Supervisor")  

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el CONDUCTOR -->
@if (Auth::user()->type === "Conductor")

        @include('automotives.automotive.dashboard-conductor')

@endif

<!-- Esto es para el MECANICO -->
@if (Auth::user()->type === "Mecánico")

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el MENSAJERO -->
@if (Auth::user()->type === "Mensajero")

        @include('automotives.automotive.dashboard')

@endif

<!-- Esto es para el DEFAULT -->
@if (Auth::user()->type === "Encargado")

        @include('automotives.automotive.dashboard')

@endif
