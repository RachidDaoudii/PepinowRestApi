<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $Show_Roles = Permission::create(['name' => 'Show-Roles', 'guard_name' => 'web']);
        // $Show_Role = Permission::create(['name' => 'Show-Role', 'guard_name' => 'web']);
        // $Add_Role = Permission::create(['name' => 'Add-Role', 'guard_name' => 'web']);
        // $Update_Role = Permission::create(['name' => 'Update-Role', 'guard_name' => 'web']);
        // $Delete_Role = Permission::create(['name' => 'Delete-Role', 'guard_name' => 'web']);
        // $ShowPermissionsOfaRole = Permission::create(['name' => 'ShowPermissionsOfaRole', 'guard_name' => 'web']);
        // $ShowRolesOfaPermissions = Permission::create(['name' => 'ShowRolesOfaPermissions', 'guard_name' => 'web']);
        // $assignPermissions = Permission::create(['name' => 'assignPermissions', 'guard_name' => 'web']);
        // $assignRole = Permission::create(['name' => 'assignRole', 'guard_name' => 'web']);
        // $RemovePermissions = Permission::create(['name' => 'RemovePermissions', 'guard_name' => 'web']);
        // $RemoveRole = Permission::create(['name' => 'RemoveRole', 'guard_name' => 'web']);

        // //Access To All
        // $accessToAll = Permission::create(['name' => '*', 'guard_name' => 'web']);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $arrayOfPermissionNAmes = [
            "create-Role",
            "update-Role",
            "show-Role",
            "delete-Role",
            "views-Role",

            "ShowPermissionsOfaRole",
            "ShowRolesOfaPermissions",
            "assignPermissions",
            "assignRole",
            "RemovePermissions",
            "RemoveRole",

            "create-Category",
            "update-Category",
            "show-Category", 
            "delete-Category",
            "views-Category", 

            "create-Plant",
            "update-Plant",
            "show-Plant",
            "delete-Plant",
            "views-Plant",

            "*"
        ];

        $permissions = collect($arrayOfPermissionNAmes)->map(function ($permissions){
            return ['name' => $permissions,'guard_name' => 'api'];
        });

        Permission::insert($permissions->toArray());
        

        $role = Role::create(['name' => 'admin'])
        ->givePermissionTo($arrayOfPermissionNAmes);
        // $role = Role::create(['name' => 'user'])
        // ->givePermissionTo(['Category show', 'Category view','Plant show','Plant view']);
        $role = Role::create(['name' => 'vendeur'])
        ->givePermissionTo($arrayOfPermissionNAmes);

        // User::factory()->count(5)->create()->each(function ($user) {
        //     $user->assignRole($this->rolesNames[rand(0,1)]);
        // });
    }
}
