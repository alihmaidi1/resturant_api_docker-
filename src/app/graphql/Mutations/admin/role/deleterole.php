<?php

namespace App\GraphQL\Mutations\Admin\role;

use App\Models\role;

final class deleterole
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $role=role::find($args["id"]);
        $role1=$role;
        $role1->message=trans("admin.the role was deleted successfully");
        $role->delete();
        return $role1;



    }
}
