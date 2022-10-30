<?php

namespace App\GraphQL\Mutations\User\wishlist;

use App\Exceptions\CustomException;
use App\Models\wishlist;

final class deletewishlist
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $wishlist=wishlist::find($args["id"]);
        if($wishlist->user_id!=auth("web")->user()->id){

            throw new CustomException(trans("admin.you don't have permmssion to this operaion"));
        }else{

            $wishlist1=$wishlist;
            $wishlist->delete();
            $wishlist1->message=trans("admin.the food was deleted from wishlist successfully");
            return $wishlist1;
        }


    }
}
