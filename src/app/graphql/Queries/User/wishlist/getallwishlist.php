<?php

namespace App\GraphQL\Queries\User\wishlist;

use App\Models\food;
use App\Models\wishlist;
use stdClass;

final class getallwishlist
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $wishlists=wishlist::where("user_id",auth("web")->user()->id)->get();
        $arr=[];
        foreach($wishlists as  $wishlist){
            $food_id=$wishlist->resturantfood->food_id;
            $food=food::find($food_id);
            $obj=new stdClass();
            $obj->food=$food;
            $arr[]=$obj;

        }

        return $arr;




    }
}
