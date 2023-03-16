<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Auth\Access\Response;

class CategoriesPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Categories $categories)
    {
        return ($this->isAdminOrVendeur($user) && $user->id === $categories->user_id   ? Response::allow()
        : Response::deny('Your are not authorized.'));
    }

    public function delete(User $user, Categories $categories):Response
    {
        return ($this->isAdminOrVendeur($user) && $user->id === $categories->user_id ? Response::allow()
        : Response::deny('Your are not authorized.'));
    }


    private function isAdminOrVendeur(User $user){
        return $user->role === UserType::Admin || $user->role === UserType::Vendeur;
    }


   
}
