<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Parent;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the parent can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the parent can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Parent  $model
     * @return mixed
     */
    public function view(User $user, parent $model)
    {
        return true;
    }

    /**
     * Determine whether the parent can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the parent can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Parent  $model
     * @return mixed
     */
    public function update(User $user, parent $model)
    {
        return true;
    }

    /**
     * Determine whether the parent can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Parent  $model
     * @return mixed
     */
    public function delete(User $user, parent $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Parent  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the parent can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Parent  $model
     * @return mixed
     */
    public function restore(User $user, parent $model)
    {
        return false;
    }

    /**
     * Determine whether the parent can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Parent  $model
     * @return mixed
     */
    public function forceDelete(User $user, parent $model)
    {
        return false;
    }
}
