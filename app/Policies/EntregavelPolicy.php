<?php

namespace App\Policies;

use App\Models\Entregavel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EntregavelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('app.entregavels.index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Entregavel $entregavel): bool
    {
        return $user->can('app.entregavels.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('app.entregavels.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Entregavel $entregavel): bool
    {
        return $user->can('app.entregavels.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Entregavel $entregavel): bool
    {
        return $user->can('app.entregavels.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Entregavel $entregavel): bool
    {
        return $user->can('app.entregavels.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Entregavel $entregavel): bool
    {
        return $user->can('app.entregavels.forceDelete');
    }
}
