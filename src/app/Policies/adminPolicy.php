<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class adminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(admin $admin,array $injected)
    {
        $admin2=admin::find($injected["id"]);

        if($admin->role_id==1 || $admin2->id==$admin->id){

            return true;
        }
        $admin2=admin::find($injected["id"]);
        if($admin2->resturant_id==$admin->resturant_id && $admin2->rank < $admin->rank){

            return true;
        }

        return false;
    }

    public function create(admin $admin,array $injected)
    {

        $adminResturant=$admin->resturant_id;
        $resturantInput=$injected["resturant_id"];
        if($admin->role_id==1|| ($resturantInput==$adminResturant && $admin->rank > $injected["rank"])){
            return true;
        }
        return false;







    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin, array $injected)
    {


        $admin2=admin::find($injected["id"]);

        if($admin2->id==$admin->id){

            return false;
        }


        if($admin->role_id==1){

            return true;
        }


        if($admin->resturant_id==$admin2->resturant_id && $admin->rank > $admin2->rank && $admin->resturant_id==$injected["resturant_id"]&& $admin->rank > $injected["rank"]){

            return true;
        }

        return false;




    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $adminResturant=$admin->resturant_id;
        $adminRank=$admin->rank;
        $admin1=admin::find($injected["id"]);
        if($admin1->resturant_id==$adminResturant&& $adminRank>$admin1->rank){

            return true;
        }
        return false;


    }
}
