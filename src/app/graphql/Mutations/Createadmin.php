<?php

namespace App\GraphQL\Mutations;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;

final class Createadmin
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=admin::create([
            "email"=>$args["email"],
            "password"=>Hash::make($args["password"]),
            "role_id"=>$args["role_id"],
            "employee_id"=>$args["employee_id"]
        ]);
        $admin->rule;
        $admin->employee;
        $admin->message=trans("admin.the admin was created successfully");
        $admin->resturant;
        return $admin;


    }
}
