<?php

namespace App\GraphQL\Mutations;

use App\Models\food;
use App\Models\wishlist;
use stdClass;

final class Addwishlist
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $wishlist=wishlist::create([

            "resturant_food_id"=>$args["resturant_food_id"],
            "user_id"=>auth("user_api")->user()->id

        ]);
        $food_id=$wishlist->resturantfood->food_id;
        $food=food::find($food_id);
        $obj=new stdClass();
        $obj->message=trans("admin.the food was added to wishlist successfully");
        $obj->food=$food;
        return $obj;
    }
}
