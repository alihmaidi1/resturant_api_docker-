<?php

namespace App\GraphQL\Mutations;
use App\Models\admin;
final class Deleteadmin
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=admin::find($args['id']);
        $admin1=$admin;
        $admin1->role;
        $admin1->message=trans("admin.the admin was deleted successfully");
        $admin1->employee;
        $admin->delete();
        return $admin1;

    }
}
