<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Certificate;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return mixed
     */
    public function view(User $user, Certificate $certificate)
    {
        //
    }

    /**
     * Determine whether the user can create certificates.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return mixed
     */
    public function update(User $user, Certificate $certificate)
    {
        //
    }

    /**
     * Determine whether the user can delete the certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return mixed
     */
    public function delete(User $user, Certificate $certificate)
    {
        //
    }

    /**
     * Determine whether the user can restore the certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return mixed
     */
    public function restore(User $user, Certificate $certificate)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the certificate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return mixed
     */
    public function forceDelete(User $user, Certificate $certificate)
    {
        //
    }
}
