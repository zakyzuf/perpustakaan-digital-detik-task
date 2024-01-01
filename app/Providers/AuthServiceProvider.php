<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\BukuPolicy;
use App\Policies\KategoriPolicy;
use Illuminate\Support\Facades\Gate;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
        Gate::define('view-book', [BukuPolicy::class, 'view']);
        Gate::define('update-book', [BukuPolicy::class, 'update']);
        Gate::define('delete-book', [BukuPolicy::class, 'delete']);

        Gate::define('update-category', [KategoriPolicy::class, 'update']);
        Gate::define('delete-category', [KategoriPolicy::class, 'delete']);
        //
    }
}
