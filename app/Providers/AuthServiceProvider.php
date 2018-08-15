<?php

namespace Uatfinfra\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Uatfinfra\Model' => 'Uatfinfra\Policies\ModelPolicy',
        //Aqui va la politica de acceson a usuarios
        'Uatfinfra\User' => 'Uatfinfra\Policies\UserPolicy',
        //Aqui el modelo######Aqui la politica de acceso
        'Uatfinfra\ModelAutomotores\Informe' => 'Uatfinfra\Policies\InformePolicy',

        'Spatie\Permission\Models\Role' => 'Uatfinfra\Policies\RolePolicy',

        'Spatie\Permission\Models\Permission' => 'Uatfinfra\Policies\PermissionPolicy',
        //Informe::class => InformePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
