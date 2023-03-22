<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('views-Role') || $user->hasPermissionTo('*');
        
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {
        return $user->hasPermissionTo('show-Role') || $user->hasPermissionTo('*');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-Role') || $user->hasPermissionTo('*');
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): bool
    {
        return $user->hasPermissionTo('update-Role') || $user->hasPermissionTo('*');
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->hasPermissionTo('delete-Role') || $user->hasPermissionTo('*');
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }

    public function assignPermissions(User $user)
    {
        return $user->hasPermissionTo('assignPermissions') || $user->hasPermissionTo('*');
    }

    public function assignRole(User $user)
    {
        return $user->hasPermissionTo('assignRole') || $user->hasPermissionTo('*');
    }

    public function RemovePermissions(User $user)
    {
        return $user->hasPermissionTo('RemovePermissions') || $user->hasPermissionTo('*');
    }

    public function RemoveRole(User $user)
    {
        return $user->hasPermissionTo('RemoveRole') || $user->hasPermissionTo('*');
    }

    public function ShowPermissionsOfaRole(User $user)
    {
        return $user->hasPermissionTo('ShowPermissionsOfaRole') || $user->hasPermissionTo('*');
    }
    public function ShowRolesOfaPermissions(User $user,Role $role)
    {
        return $user->hasPermissionTo('ShowRolesOfaPermissions') || $user->hasPermissionTo('*');
    }
}
