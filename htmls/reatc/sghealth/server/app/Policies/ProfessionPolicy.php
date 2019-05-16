<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Profession;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Builder;

class ProfessionPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can access Profession list.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profession  $profession
     * @return mixed
     */
    public function index(User $user, $profession)
    {

        return true;
    }
    /**
     * Determine whether the user can view the Profession.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Profession  $Profession
     * @return mixed
     */
    public function view(User $user, Profession $profession)
    {
        //
    }

    /**
     * Determine whether the user can create Profession.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the Profession.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Profession  $profession
     * @return mixed
     */
    public function update(User $user, Profession $profession)
    {
        //

        return true;
    }

    /**
     * Determine whether the user can delete the Profession.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Profession  $profession
     * @return mixed
     */
    public function delete(User $user, Profession $profession)
    {
        //
    }

    /**
     * Determine whether the user can restore the Profession.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Profession  $profession
     * @return mixed
     */
    public function restore(User $user, Profession $profession)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Profession.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Designation  $profession
     * @return mixed
     */
    public function forceDelete(User $user, Profession $profession)
    {
        //
    }
}
