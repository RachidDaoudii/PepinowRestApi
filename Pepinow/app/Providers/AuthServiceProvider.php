<?php

namespace App\Providers;


use App\Models\Categories;
use App\Models\Plantes;
use App\Policies\CategoriesPolicy;
use App\Policies\PlantPolicy;
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
        Plantes::class => PlantPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
