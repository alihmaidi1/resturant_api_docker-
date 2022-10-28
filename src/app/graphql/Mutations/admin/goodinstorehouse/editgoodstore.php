<?php

namespace App\GraphQL\Mutations\Admin\goodinstorehouse;

use App\Models\storeGood;

final class editgoodstore
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $goodstore=storeGood::find($args["id"]);
        $goodstore->quantity=$args["quantity"];
        $goodstore->save();
        $goodstore->message=trans("admin.the quantity of good was updated successfully in this storehouse");
        return $goodstore;

    }
}
