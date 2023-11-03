<?php

namespace App\Policies;

use App\Models\Contrato;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContratoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('app.contratos.index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Contrato $contrato): bool
    {
        return $user->can('app.contratos.view');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('app.contratos.create');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Contrato $contrato): bool
    {
        return $user->can('app.contratos.update');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Contrato $contrato): bool
    {
        return $user->can('app.contratos.delete');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Contrato $contrato): bool
    {
        return $user->can('app.contratos.restore');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Contrato $contrato): bool
    {
        return $user->can('app.contratos.forcedelete');

    }
}
