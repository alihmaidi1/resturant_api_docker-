<?php

namespace App\GraphQL\Mutations\Admin\account;

use App\Models\admin;

final class deleteadmin
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
        $admin->delete();
        return $admin1;


    }
}
