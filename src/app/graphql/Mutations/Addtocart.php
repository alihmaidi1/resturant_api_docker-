<?php

namespace App\GraphQL\Mutations;

use App\Models\cart;
use App\Models\food;

final class Addtocart
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $cart=cart::create([

            "resturant_food_id"=>$args["resturant_food_id"],
            "quantity"=>$args["quantity"],
            "user_id"=>auth("user_api")->user()->id

        ]);
        $food_id=$cart->resturantfood->food_id;
        $food=food::find($food_id);
        $cart->food=$food;
        $cart->message=trans("admin.the food in resturant was added to cart successfully");
        return $cart;

    }
}
