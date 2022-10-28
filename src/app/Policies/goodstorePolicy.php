<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\User;
use App\Models\storeGood;
use App\Models\storehouse;
use Illuminate\Auth\Access\HandlesAuthorization;

class goodstorePolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storeGood  $storeGood
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $resturantId=storehouse::find($injected["storehouse_id"])->resturant_id;
        if($admin->resturant_id==$resturantId){

            return true;
        }

        return false;


    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $storehouse=storehouse::find($injected["storehouse_id"]);
        if($admin->resturant_id==$storehouse->resturant_id){

            return true;
        }

        return false;
    }


    public function updateQuantity(admin $admin,array $injected){


        if($admin->role_id==1){

            return true;
        }

        $storehosueId=storeGood::find($injected["id"])->storehouse->id;
        $resturantId=storehouse::find($storehosueId)->resturant_id;
        if($admin->resturant_id==$resturantId){

            return true;
        }

        return false;


    }
    public function updateminQuantity(admin $admin,array $injected){


        if($admin->role_id==1){

            return true;
        }

        $storehosueId=storeGood::find($injected["id"])->storehouse->id;
        $resturantId=storehouse::find($storehosueId)->resturant_id;
        if($admin->resturant_id==$resturantId){

            return true;
        }

        return false;


    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storeGood  $storeGood
     * @return \Illuminate\Auth\Access\Response|bool
     */

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storeGood  $storeGood
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $storehosueId=storeGood::find($injected["id"])->storehouse->id;
        $resturantId=storehouse::find($storehosueId)->resturant_id;
        if($admin->resturant_id==$resturantId){

            return true;
        }

        return false;


    }
}
