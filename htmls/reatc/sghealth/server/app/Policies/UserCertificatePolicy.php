<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserCertificate;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserCertificatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCertificate  $userCertificate
     * @return mixed
     */
    public function view(User $user, UserCertificate $userCertificate)
    {
        //
    }

    /**
     * Determine whether the user can create user certificates.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the user certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCertificate  $userCertificate
     * @return mixed
     */
    public function update(User $user, UserCertificate $userCertificate)
    {
        //
    }

    /**
     * Determine whether the user can delete the user certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCertificate  $userCertificate
     * @return mixed
     */
    public function delete(User $user, UserCertificate $userCertificate)
    {
        //
    }

    /**
     * Determine whether the user can restore the user certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCertificate  $userCertificate
     * @return mixed
     */
    public function restore(User $user, UserCertificate $userCertificate)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the user certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCertificate  $userCertificate
     * @return mixed
     */
    public function forceDelete(User $user, UserCertificate $userCertificate)
    {
        //
    }
}
