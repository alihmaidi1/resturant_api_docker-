<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomException;
use App\Models\cart;
use App\Models\food;

final class Editcartquantity
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $cart=cart::find($args["id"]);
        if($cart->user_id!=auth("user_api")->user()->id){

            throw new CustomException(trans("admin.you don't have permssion to do this operation"));
        }else{

            $cart->quantity=$args["quantity"];
            $cart->save();
            $food_id=$cart->resturantfood->food_id;
            $food=food::find($food_id);
            $cart->food=$food;
            $cart->message=trans("admin.the quantity in this cart was updated successfully");
            return $cart;
        }

    }
}
