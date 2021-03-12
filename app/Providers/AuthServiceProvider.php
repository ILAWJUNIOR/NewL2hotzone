<?php

namespace App\Providers;

use App\LegacySessionGuard;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Gate as GateContract;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    // protected $policies = [
    //     'App\Model' => 'App\Policies\ModelPolicy',
    // ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate, AuthManager $auth)
    {
        $this->registerPolicies($gate);

        $auth->extend('legacy', function ($app) use ($auth) {
            $config = $app['config']['auth.guards.legacy'];
            $provider = $auth->createUserProvider($config['provider']);

            return new LegacySessionGuard('legacy', $provider, $this->app['session.store']);
        });
    }
}
