<?php

namespace App\GraphQL\Mutations\Admin\employee;

use App\Models\employee;

final class deleteemployee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $employee=employee::find($args["id"]);
        $employee1=$employee;
        $employee->delete();
        $employee1->message=trans("admin.the employee was deleted successfully");
        return $employee1;


    }
}
