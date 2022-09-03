<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AcademicClass;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcademicClassPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the academicClass can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the academicClass can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicClass  $model
     * @return mixed
     */
    public function view(User $user, AcademicClass $model)
    {
        return true;
    }

    /**
     * Determine whether the academicClass can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the academicClass can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicClass  $model
     * @return mixed
     */
    public function update(User $user, AcademicClass $model)
    {
        return true;
    }

    /**
     * Determine whether the academicClass can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicClass  $model
     * @return mixed
     */
    public function delete(User $user, AcademicClass $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicClass  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the academicClass can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicClass  $model
     * @return mixed
     */
    public function restore(User $user, AcademicClass $model)
    {
        return false;
    }

    /**
     * Determine whether the academicClass can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicClass  $model
     * @return mixed
     */
    public function forceDelete(User $user, AcademicClass $model)
    {
        return false;
    }
}
