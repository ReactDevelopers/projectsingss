<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PermissionGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the permission group.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return mixed
     */
    public function view(User $user, PermissionGroup $permissionGroup)
    {
        //
    }

    /**
     * Determine whether the user can create permission groups.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the permission group.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return mixed
     */
    public function update(User $user, PermissionGroup $permissionGroup)
    {
        //
    }

    /**
     * Determine whether the user can delete the permission group.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return mixed
     */
    public function delete(User $user, PermissionGroup $permissionGroup)
    {
        //
    }

    /**
     * Determine whether the user can restore the permission group.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return mixed
     */
    public function restore(User $user, PermissionGroup $permissionGroup)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the permission group.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return mixed
     */
    public function forceDelete(User $user, PermissionGroup $permissionGroup)
    {
        //
    }
}
