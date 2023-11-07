<?php

namespace App\Policies;

use App\Models\Config;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ConfigPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('app.configs.index');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Config $config): bool
    {
        return $user->can('app.configs.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('app.configs.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Config $config): bool
    {
        return $user->can('app.configs.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Config $config): bool
    {
        return $user->can('app.configs.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Config $config): bool
    {
        return $user->can('app.configs.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Config $config): bool
    {
        return $user->can('app.configs.forceDelete');
    }
}
