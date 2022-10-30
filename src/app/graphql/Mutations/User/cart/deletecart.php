<?php

namespace App\GraphQL\Mutations\User\cart;

use App\Exceptions\CustomException;
use App\Models\cart;

final class deletecart
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $cart=cart::find($args["id"]);
        if($cart->user_id!=auth("web")->user()->id){
            throw new CustomException(trans("admin.you don't have permssion to do this operation"));
        }else{

        $cart1=$cart;
        $cart->delete();
        $cart1->message=trans("admin.the food was deleted successfully from your cart");
        return $cart1;


        }


    }
}
