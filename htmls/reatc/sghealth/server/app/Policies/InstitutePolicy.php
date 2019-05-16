<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Institute;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstitutePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the institute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Institute  $institute
     * @return mixed
     */
    public function view(User $user, Institute $institute)
    {
        //
    }

    /**
     * Determine whether the user can create institutes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the institute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Institute  $institute
     * @return mixed
     */
    public function update(User $user, Institute $institute)
    {
        //
    }

    /**
     * Determine whether the user can delete the institute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Institute  $institute
     * @return mixed
     */
    public function delete(User $user, Institute $institute)
    {
        //
    }

    /**
     * Determine whether the user can restore the institute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Institute  $institute
     * @return mixed
     */
    public function restore(User $user, Institute $institute)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the institute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Institute  $institute
     * @return mixed
     */
    public function forceDelete(User $user, Institute $institute)
    {
        //
    }
}
