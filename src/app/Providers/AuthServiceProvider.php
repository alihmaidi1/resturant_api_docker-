<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Carbon\Carbon;
use \App\Models\admin;
use App\Policies\AdminPolicy;
use Illuminate\Support\Facades\Config;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        admin::class=>AdminPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach(Config::get("global.permssion") as $name=>$value){


        Gate::define($name,function(admin $admin) use($name){

            $permissions=$admin->role->permssion;
            foreach($permissions as $permission){

                if($permission==$name){

                    return true;
                }

            }

            return false;

        });



        }
            Passport::tokensExpireIn(Carbon::now()->addMinutes(60));
            Passport::refreshTokensExpireIn(Carbon::now()->addDays(5));


        //
    }
}
