<?php

namespace App\GraphQL\Mutations;

use App\Models\storehouse;

final class Getallresturantstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $storehouses=storehouse::where("resturant_id",$args["resturant_id"])->get();
        return $storehouses;

    }
}
