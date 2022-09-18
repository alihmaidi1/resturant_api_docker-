<?php

namespace App\GraphQL\Mutations;

use \App\Models\resturant;
use Illuminate\Support\Facades\Cache;

final class Deleteresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $resturant=resturant::find($args["id"]);
        Cache::pull("resturant:".$resturant->id);
        $resturant1=$resturant;
        $resturant->delete();
        Cache::pull("resturants");
        $resturant1->message=trans("admin.the resturant was deleted successfully");
        return $resturant1;
    }
}
