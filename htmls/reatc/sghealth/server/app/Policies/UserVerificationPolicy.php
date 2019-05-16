<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserVerificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user verification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserVerification  $userVerification
     * @return mixed
     */
    public function view(User $user, UserVerification $userVerification)
    {
        //
    }

    /**
     * Determine whether the user can create user verifications.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the user verification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserVerification  $userVerification
     * @return mixed
     */
    public function update(User $user, UserVerification $userVerification)
    {
        //
    }

    /**
     * Determine whether the user can delete the user verification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserVerification  $userVerification
     * @return mixed
     */
    public function delete(User $user, UserVerification $userVerification)
    {
        //
    }

    /**
     * Determine whether the user can restore the user verification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserVerification  $userVerification
     * @return mixed
     */
    public function restore(User $user, UserVerification $userVerification)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the user verification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserVerification  $userVerification
     * @return mixed
     */
    public function forceDelete(User $user, UserVerification $userVerification)
    {
        //
    }
}
