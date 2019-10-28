<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('ehAutor', function ($user) {
            // if($user->autor == 'S'){
            //     return true;
            // }
            // return false;
            // dd($user);
            return $user->autor == 'S';
        });

        Gate::define('ehAdmin', function ($user) {
            // return ($user->admin == 'S' ? true : $user->autor == 'S' );
            return $user->admin == 'S';
        });

        // Gate::before(function ($user) {
        //     return $user->admin == 'S';
        // });
    }
}
