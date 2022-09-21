<?php

namespace App\GraphQL\Mutations;

use App\Models\storeGood;

final class Deletegoodstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $goodstore=storeGood::find($args["id"]);
        $goodstore1=$goodstore;
        $goodstore->delete();
        $goodstore1->message=trans("admin.the good was delete from this storehouse successfully");
        return $goodstore1;
    }
}
