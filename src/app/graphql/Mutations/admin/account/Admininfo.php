<?php

namespace App\GraphQL\Mutations\Admin\account;

use App\Models\admin;

final class Admininfo
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=admin::find($args['id']);

        $admin->message=trans("admin.the data was feteched successfully");
        return $admin;



    }
}
