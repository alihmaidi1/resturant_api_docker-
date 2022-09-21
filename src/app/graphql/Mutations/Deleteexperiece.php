<?php

namespace App\GraphQL\Mutations;

use App\Models\employee_experience;

final class Deleteexperiece
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $experiece=employee_experience::find($args["id"]);
        $experiece1=$experiece;
        $experiece->delete();
        $experiece1->message=trans("admin.the experiece was deleted successfully");
        return $experiece1;
    }
}
