<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Plantes;
use App\Enums\UserType;
use Illuminate\Auth\Access\Response;



class PlantPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Plantes $plantes)
    {
        return ($this->isAdmin($user) || $user->id === $plantes->user_id ? Response::allow()
        : Response::deny('Your are not authorized.'));
    }

    public function delete(User $user, Plantes $plantes):Response
    {
        return ($this->isAdmin($user) || $user->id === $plantes->user_id ? Response::allow()
        : Response::deny('Your are not authorized.'));
    }

    private function isAdmin(User $user){
        return $user->role === UserType::Admin;
    }
}
