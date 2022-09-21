<?php

namespace App\GraphQL\Queries;

use App\Models\employee_experience;

final class Getallexperiece
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
