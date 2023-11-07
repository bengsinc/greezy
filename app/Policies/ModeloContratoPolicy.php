<?php

namespace App\Policies;

use App\Models\ModeloContrato;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ModeloContratoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('admin.modelo-contratos.index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ModeloContrato $modeloContrato): bool
    {
        return $user->can('admin.modelo-contratos.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('admin.modelo-contratos.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ModeloContrato $modeloContrato): bool
    {
        return $user->can('admin.modelo-contratos.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ModeloContrato $modeloContrato): bool
    {
        return $user->can('admin.modelo-contratos.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ModeloContrato $modeloContrato): bool
    {
        return $user->can('admin.modelo-contratos.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ModeloContrato $modeloContrato): bool
    {
        return $user->can('admin.modelo-contratos.forceDelete');
    }
}
