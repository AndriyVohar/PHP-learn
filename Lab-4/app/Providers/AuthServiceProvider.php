<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::define('view-tournament', function (User $user) {
        //     return true;
        // });
    
        Gate::define('create-tournament', function (User $user) {
            return true;
        });
    
        Gate::define('edit-tournament', function (User $user, $tournament) {
            if($user->role === "editor"||$user->role === "superadmin") return true;
            return $user->id === $tournament->creator_user_id;
        });
    
        Gate::define('delete-tournament', function (User $user, $tournament) {
            if($user->role === "superadmin") return true;
            return $user->id === $tournament->user_id;
        });
    }
}
