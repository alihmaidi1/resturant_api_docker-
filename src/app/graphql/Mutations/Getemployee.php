<?php

namespace App\GraphQL\Mutations;

use App\Models\employee;

final class Getemployee
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
