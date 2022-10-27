<?php

namespace App\GraphQL\Queries\Admin\role;

use App\Models\role;

final class getallrole
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return role::all();

    }
}
