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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $arrayOfPermissionNAmes = [
            "Category create",
            "Category update",
            "Category show",
            "Category delete",
            "Category view",

            "Plant create",
            "Plant update",
            "Plant show",
            "Plant delete",
            "Plant view",
        ];

        $permissions = collect($arrayOfPermissionNAmes)->map(function ($permissions){
            return ['name' => $permissions,'guard_name' => 'api'];
        });

        Permission::insert($permissions->toArray());

        $role = Role::create(['name' => 'admin'])
        ->givePermissionTo($arrayOfPermissionNAmes);
        $role = Role::create(['name' => 'user'])
        ->givePermissionTo($arrayOfPermissionNAmes);
        $role = Role::create(['name' => 'vendeur'])
        ->givePermissionTo($arrayOfPermissionNAmes);

        // User::factory()->count(5)->create()->each(function ($user) {
        //     $user->assignRole($this->rolesNames[rand(0,1)]);
        // });
    }
}
