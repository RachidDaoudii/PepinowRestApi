<?php

namespace App\Providers;


use App\Models\Plantes;
use App\Models\Categories;
use App\Policies\RolePolicy;
use App\Policies\PlantesPolicy;
use App\Policies\CategoriesPolicy;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\Categories' => 'App\Policies\CategoriesPolicy',
        Categories::class => CategoriesPolicy::class,
        Plantes::class => PlantesPolicy::class,
        Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
