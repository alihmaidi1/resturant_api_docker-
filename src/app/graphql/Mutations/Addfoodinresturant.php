<?php

namespace App\GraphQL\Mutations;

use App\Models\resturant_food;
use Illuminate\Support\Facades\Cache;

final class Addfoodinresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $foodinresturant=resturant_food::create([
            "resturant_id"=>$args["resturant_id"],
            "food_id"=>$args["food_id"],
            "isVisiable"=>$args["isVisiable"],
            "price"=>$args["price"],
            "currency_id"=>$args["currency_id"]
        ]);

        $foodinresturant->message=trans("admin.the food was added to resturant successfully");
        return $foodinresturant;

    }
}
