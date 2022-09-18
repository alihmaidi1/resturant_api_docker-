<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Cache;

final class Findresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $resturant=Cache::get("resturant:".$args["id"]);
        $resturant->message=trans("admin.the data was fetched successfully");
        return $resturant;

    }
}
