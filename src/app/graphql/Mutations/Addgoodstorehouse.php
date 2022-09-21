<?php

namespace App\GraphQL\Mutations;

use App\Models\storeGood;

final class Addgoodstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $goodstore=storeGood::create([
            "quantity"=>$args["quantity"],
            "min_quantity"=>$args["min_quantity"],
            "good_id"=>$args["good_id"],
            "storehouse_id"=>$args["storehouse_id"]
        ]);
        $goodstore->message=trans("admin.the good was added to storehouse successfully");

        return $goodstore;
    }
}
