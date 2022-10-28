<?php

namespace App\GraphQL\Mutations\Admin\experience;

use App\Models\employee_experience;

final class addexperiece
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $experiece=employee_experience::create([

            "year"=>$args["year"],
            "benifit"=>$args["benifit"],
            "vacation"=>$args["vacation"]

        ]);
        $experiece->message=trans("admin.the experiece was added successfully");
        return $experiece;


    }
}
