<?php

namespace App\Policies;

use App\Models\Clausula;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClausulaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('admin.clausulas.index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Clausula $clausula): bool
    {
        return $user->can('admin.clausulas.view');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('admin.clausulas.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Clausula $clausula): bool
    {
        return $user->can('admin.clausulas.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Clausula $clausula): bool
    {
        return $user->can('admin.clausulas.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Clausula $clausula): bool
    {
        return $user->can('admin.clausulas.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Clausula $clausula): bool
    {
        return $user->can('admin.clausulas.forceDelete');
    }
}
