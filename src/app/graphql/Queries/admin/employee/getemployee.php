<?php

namespace App\GraphQL\Queries\Admin\employee;

use App\Models\employee;

final class getemployee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $employee=employee::find($args["id"]);
        $employee->message=trans("admin.the data was fethed successfully");
        return $employee;

    }
}
