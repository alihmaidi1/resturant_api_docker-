<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\User;
use App\Models\resturant_food;
use Illuminate\Auth\Access\HandlesAuthorization;

class foodresturantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\resturant_food  $resturantFood
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, resturant_food $resturantFood)
    {
        //
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

        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\resturant_food  $resturantFood
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }
        $resturant_id=resturant_food::find($injected["id"])->resturant_id;

        if($admin->resturnat_id==$injected["resturant_id"]&& $admin->resturant_id==$resturant_id){

            return true;
        }

        return false;


    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\resturant_food  $resturantFood
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, resturant_food $resturantFood)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\resturant_food  $resturantFood
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, resturant_food $resturantFood)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\resturant_food  $resturantFood
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $resturant_id=resturant_food::find($injected["id"])->resturant_id;
        if($admin->resturant_id==$resturant_id){


            return true;
        }

        return true;

    }
}
