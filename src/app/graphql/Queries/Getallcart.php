<?php

namespace App\GraphQL\Queries;

use App\Models\cart;
use App\Models\food;
use stdClass;

final class Getallcart
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $carts=cart::where("user_id",auth("user_api")->user()->id)->get();
        $arr=[];
        foreach($carts as $cart){
            $obj=new stdClass();
            $food_id=$cart->resturantfood->food_id;
            $food=food::find($food_id);
            $obj->food=$food;
            $obj->quantity=$cart->quantity;
            $arr[]=$obj;
        }


        return $arr;
    }
}
