<?php

namespace App\GraphQL\Mutations\Admin\account;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;

final class createadmin
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
            "resturant_id"=>$args["resturant_id"],
            "rank"=>$args["rank"]
        ]);
        $admin->message=trans("admin.the admin was created successfully");
        return $admin;


    }
}
