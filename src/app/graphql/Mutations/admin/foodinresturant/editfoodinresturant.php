<?php

namespace App\GraphQL\Mutations\Admin\foodinresturant;

use App\Models\resturant_food;

final class editfoodinresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $foodinresturant=resturant_food::find($args["id"]);
        $foodinresturant->resturant_id=$args["resturant_id"];
        $foodinresturant->food_id=$args["food_id"];
        $foodinresturant->isVisiable=$args["isVisiable"];
        $foodinresturant->price=$args["price"];
        $foodinresturant->currency_id=$args["currency_id"];
        $foodinresturant->save();
        $foodinresturant->message=trans("admin.the food in resturant was updated data successfully");
        return $foodinresturant;


    }
}
