<?php

namespace App\Policies;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoriesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('views-Category') || $user->hasPermissionTo('*');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Categories $categories): bool
    {
        return $user->hasPermissionTo('show-Category') || $user->hasPermissionTo('*');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-Category') || $user->hasPermissionTo('*');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Categories $categories): bool
    {
        return ( $user->hasPermissionTo('update-Category') && $user->id == $categories->user_id ) || $user->hasPermissionTo('*');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Categories $categories): bool
    {
        return ( $user->hasPermissionTo('delete-Category') && $user->id == $categories->user_id ) || $user->hasPermissionTo('*');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Categories $categories)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Categories $categories)
    {
        //
    }
}
