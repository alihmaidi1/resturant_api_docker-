<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\User;
use App\Models\storehouse;
use Illuminate\Auth\Access\HandlesAuthorization;

class storehousePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;

        }
        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return false;
    }


    public function create(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;

        }
        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return false;


    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storehouse  $storehouse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;

        }
        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return false;


    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storehouse  $storehouse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;

        }
        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return false;


    }
}
