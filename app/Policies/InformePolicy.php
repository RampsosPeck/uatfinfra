<?php

namespace Uatfinfra\Policies;

use Uatfinfra\User;
use Uatfinfra\ModelAutomotores\Informe;
use Illuminate\Auth\Access\HandlesAuthorization;

class InformePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if(auth()->user()->hasRole('Administrator'))
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view the informe.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Uatfinfra\Informe  $informe
     * @return mixed
     */
    public function view(User $user, Informe $informe)
    {
        //return true;
        return $user->id === $informe->conductor 
            || $user->hasPermissionTo('View Informes');
        
    }

    /**
     * Determine whether the user can create informes.
     *
     * @param  \Uatfinfra\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  $user->hasPermissionTo('Create Informes');
    }

    /**
     * Determine whether the user can update the informe.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Uatfinfra\Informe  $informe
     * @return mixed
     */
    public function update(User $user, Informe $informe)
    {
        return $user->id === $informe->conductor
            || $user->hasPermissionTo('Update Informes');
    }

    /**
     * Determine whether the user can delete the informe.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Uatfinfra\Informe  $informe
     * @return mixed
     */
    public function delete(User $user, Informe $informe)
    {
        return $user->id === $informe->conductor
            || $user->hasPermissionTo('Delete Informes');
    }
}
