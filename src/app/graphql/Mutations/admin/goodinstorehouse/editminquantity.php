<?php

namespace App\GraphQL\Mutations\Admin\goodinstorehouse;

use App\Models\storeGood;

final class editminquantity
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $goodstore=storeGood::find($args["id"]);
        $goodstore->min_quantity=$args["min_quantity"];
        $goodstore->save();
        $goodstore->message=trans("admin.min quantity was updated successfully");
        return $goodstore;


    }
}
