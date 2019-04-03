<?php

namespace Uatfinfra\Policies;

use Uatfinfra\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function view(User $user, Permission $permission)
    {
        return $user->hasRole('Administrator') || $user->hasPermissionTo('View Permissions');
    }

     

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        return $user->hasRole('Administrator') || $user->hasPermissionTo('Update Permissions');
        
    }
 
}
