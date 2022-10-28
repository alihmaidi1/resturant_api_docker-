<?php

namespace App\GraphQL\Queries\Admin\storehouse;

use App\Models\storehouse;

final class getallresturantstorehouse
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
