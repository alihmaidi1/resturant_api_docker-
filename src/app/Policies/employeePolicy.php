<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\User;
use App\Models\employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class employeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $employee=employee::find($injected["id"]);
        if($admin->resturant_id==$employee->resturant_id){

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

        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return false;


    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\employee  $employee
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
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $employee=employee::find($injected["id"]);
        if($admin->resturant_id==$employee->resturant_id){

            return true;
        }

        return false;
    }
}
