<?php

namespace Uatfinfra\Policies;

use Uatfinfra\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Uatfinfra\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->hasRole('Administrator') || $user->hasPermissionTo('View Roles');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \Uatfinfra\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Administrator') || $user->hasPermissionTo('Create Roles');
        
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Uatfinfra\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->hasRole('Administrator') || $user->hasPermissionTo('Update Roles');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Uatfinfra\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        if($role->id === 1)
        {
            //throw new \Illuminate\Auth\Access\AuthorizationException('No se puede eliminar este rol..!');
            //return false;
            $this->deny('No se puede eliminar este rol..!');
        }

        return $user->hasRole('Administrator') || $user->hasPermissionTo('Delete Roles');
    }
}
