@component('mail::message')
# Activación de cuenta al departamento de Infraestructura de la U.A.T.F. 

Ingresa a este link para activar tu cuenta

@component('mail::button', ['url' => route('activation', $user->token)])
Activa tu cuenta
@endcomponent

Gracias,<br>
U.A.T.F. Departamento de Infraestructura.
@endcomponent
