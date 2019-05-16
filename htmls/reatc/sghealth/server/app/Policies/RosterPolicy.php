<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Roster;
use Illuminate\Auth\Access\HandlesAuthorization;

class RosterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the roster.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roster  $roster
     * @return mixed
     */
    public function view(User $user, Roster $roster)
    {
        //
    }

    /**
     * Determine whether the user can create rosters.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the roster.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roster  $roster
     * @return mixed
     */
    public function update(User $user, Roster $roster)
    {
        //
    }

    /**
     * Determine whether the user can delete the roster.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roster  $roster
     * @return mixed
     */
    public function delete(User $user, Roster $roster)
    {
        //
    }

    /**
     * Determine whether the user can restore the roster.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roster  $roster
     * @return mixed
     */
    public function restore(User $user, Roster $roster)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the roster.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roster  $roster
     * @return mixed
     */
    public function forceDelete(User $user, Roster $roster)
    {
        //
    }
}
