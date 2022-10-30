<?php

namespace App\GraphQL\Mutations\Admin\account;

use App\Models\admin;
use Illuminate\Support\Facades\Hash;

final class updateadmin
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=admin::find($args["id"]);
        $admin->email=$args["email"];
        $admin->role_id=$args["role_id"];
        $admin->resturant_id=$args["resturant_id"];
        $admin->rank=$args["rank"];
        if($args["password"]!=null){

            $admin->password=Hash::make($args["password"]);

        }
        $admin->save();
        $admin->message=trans("admin.the admin was updated successfully");
        return $admin;
    }
}
