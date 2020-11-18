<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        $user = \Auth::user();

        Gate::define('create', function ($user) {
            return in_array($user->role_id, [1,2]);
        });

        Gate::define('edit', function ($user) {
            return in_array($user->role_id, [1,2]);
        });

        Gate::define('read', function ($user) {
            return in_array($user->role_id, [1,2,3]);
        });

        Gate::define('delete', function ($user) {
            return $user->role_id === 1;
        });
    }
}
