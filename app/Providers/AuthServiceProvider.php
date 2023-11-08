<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Player;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies =
    [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
    
        $this->registerPolicies();
        Gate::define('edit-player',function(User $user,Player $player)
        {
         return auth()->user()->id === $player->user_id;
        });
    }
}
