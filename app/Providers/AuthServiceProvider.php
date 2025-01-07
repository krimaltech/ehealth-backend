<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\SubRole;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
   
        Passport::routes();
        Passport::tokensExpireIn(now()->addMinutes(60));
        Passport::refreshTokensExpireIn(now()->addMinutes(60));
        Passport::personalAccessTokensExpireIn(now()->addMinutes(60));
        $roles = Role::all();
        $sub_roles = SubRole::all();

        /* define a user role */
        foreach ($roles as $role) {
            Gate::define($role->role_type, function ($user) use($role) {
                foreach ($user->roles as $key) {
                    return $key->id == $role->id;
                }
            });
        }

        /* define a user sub role */
        foreach ($sub_roles as $subrole) {
            Gate::define($subrole->subrole, function ($user) use($subrole) {
                return $user->subrole == $subrole->id;
            });
        }
    }
}