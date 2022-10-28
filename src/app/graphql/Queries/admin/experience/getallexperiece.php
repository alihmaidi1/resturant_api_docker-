<?php

namespace App\GraphQL\Queries\Admin\experience;

use App\Models\employee_experience;

final class getallexperiece
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return employee_experience::all();
    }
}
