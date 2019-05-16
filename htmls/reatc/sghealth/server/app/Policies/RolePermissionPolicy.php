<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RolePermission;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RolePermission  $rolePermission
     * @return mixed
     */
    public function view(User $user, RolePermission $rolePermission)
    {
        //
    }

    /**
     * Determine whether the user can create role permissions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the role permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RolePermission  $rolePermission
     * @return mixed
     */
    public function update(User $user, RolePermission $rolePermission)
    {
        //
    }

    /**
     * Determine whether the user can delete the role permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RolePermission  $rolePermission
     * @return mixed
     */
    public function delete(User $user, RolePermission $rolePermission)
    {
        //
    }

    /**
     * Determine whether the user can restore the role permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RolePermission  $rolePermission
     * @return mixed
     */
    public function restore(User $user, RolePermission $rolePermission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the role permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RolePermission  $rolePermission
     * @return mixed
     */
    public function forceDelete(User $user, RolePermission $rolePermission)
    {
        //
    }
}
