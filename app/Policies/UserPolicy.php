<?php

namespace Uatfinfra\Policies;

use Uatfinfra\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * Determine whether the user can view the model.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Uatfinfra\User  $model
     * @return mixed
     */
    public function view(User $authUser, User $user)
    {
        return $authUser->id === $user->id 
            || $user->hasPermissionTo('View Users');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Uatfinfra\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create Users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Uatfinfra\User  $model
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id
            || $user->hasPermissionTo('Update Users');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Uatfinfra\User  $user
     * @param  \Uatfinfra\User  $model
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
        return $authUser->id === $user->id
            || $user->hasPermissionTo('Delete Users');
    }
}
