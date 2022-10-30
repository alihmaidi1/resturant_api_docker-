<?php

namespace App\GraphQL\Mutations\Admin\foodinresturant;

use App\Models\resturant_food;

final class deletefoodresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $foodinresturant=resturant_food::find($args["id"]);
        $foodinresturant1=$foodinresturant;
        $foodinresturant->delete();
        $foodinresturant1->message=trans("admin.the food in resturant was deleted successfully");
        return $foodinresturant1;


    }
}
