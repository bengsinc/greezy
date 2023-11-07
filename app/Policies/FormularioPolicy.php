<?php

namespace App\Policies;

use App\Models\Formulario;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FormularioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('app.formularios.index');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Formulario $formulario): bool
    {
        return $user->can('app.formularios.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('app.formularios.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Formulario $formulario): bool
    {
//        return $user->can('app.formularios.update');
        return $user->id === $formulario->user_id;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Formulario $formulario): bool
    {
        return $user->can('app.formularios.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Formulario $formulario): bool
    {
        return $user->can('app.formularios.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Formulario $formulario): bool
    {
        return $user->can('app.formularios.ferceDelete');
    }
}
