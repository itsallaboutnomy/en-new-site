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

         // Implicitly grant "Super Admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Super Admin')) {
                return true;
            }
        });

        Gate::define('isAdmin', function($user) {
            $role = $user->roles()->first();
            return $role->name == 'Admin';
        });

        Gate::define('isAccounts', function($user) {
            $role = $user->roles()->first();
            return $role->name == 'Accounts';
        });

        Gate::define('isSupport', function($user) {
            $role = $user->roles()->first();
            return $role->name == 'Support';
        });

        Gate::define('isAdminOrSupportOrAccounts', function($user) {
            $role = $user->roles()->first();
            return $role->name == 'Admin' || $role->name =='Support' || $role->name =='Accounts';
        });

        Gate::define('isAdminOrSupport', function($user) {
            $role = $user->roles()->first();
            return $role->name == 'Admin' || $role->name =='Support';
        });

        Gate::define('isAdminOrAccounts', function($user) {
            $role = $user->roles()->first();
            return $role->name == 'Admin' || $role->name =='Accounts';
        });

        Gate::define('isSupportOrAccounts', function($user) {
            $role = $user->roles()->first();
            return $role->name == 'Support' || $role->name =='Accounts';
        });

    }
}
