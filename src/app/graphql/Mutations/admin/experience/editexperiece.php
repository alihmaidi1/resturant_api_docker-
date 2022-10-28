<?php

namespace App\GraphQL\Mutations\Admin\experience;

use App\Models\employee_experience;

final class editexperiece
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $experiece=employee_experience::find($args["id"]);
        $experiece->year=$args["year"];
        $experiece->benifit=$args["benifit"];
        $experiece->vacation=$args["vacation"];
        $experiece->save();
        $experiece->message=trans("admin.the experiece was updated successfully");
        return $experiece;


    }
}
