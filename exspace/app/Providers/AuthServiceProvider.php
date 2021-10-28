<?php

namespace App\Providers;

use App\Models\Nft;
use App\Models\User;
use App\Policies\NftPolicy;
use App\Policies\Userpolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    var $nftClass = Nft::class;
    var $userClass = User::class;
    
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Nft::class => NftPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::guessPolicyNamesUsing(function ($nftClass) {
           return NftPolicy::class;
        });

        Gate::guessPolicyNamesUsing(function ($userClass) {
            return UserPolicy::class;
         });

        //  
    }
}
