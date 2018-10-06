<?php

namespace App\Providers;

use App\Policies\TodoPolicy;
use App\Repositories\Models\Todo;
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
        Todo::class => TodoPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-access', function ($user, $todo) {
            return $user->id == $todo->user_id;
        });
    }
}
