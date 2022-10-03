<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomException;
use App\Models\cart;
use App\Models\food;

final class Deletecart
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

        $cart1=$cart;
        $cart->delete();
        $cart1->message=trans("admin.the food was deleted successfully from your cart");
        return $cart1;


        }

    }
}
