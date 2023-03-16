<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\UserType;
use App\Models\Plantes;
use Illuminate\Auth\Access\Response;

class PlantesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Plantes $plantes): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Plantes $plantes): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Plantes $plantes):Response
    {
        dd($plantes);
        return $user->role === UserType::Admin && $user->id === $plantes->user_id ? Response::allow()
        : Response::deny('Your are not authorized.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Plantes $plantes): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Plantes $plantes): bool
    {
        //
    }
}
