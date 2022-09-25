<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Cache;

final class Getfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $food=Cache::get("food_".$args["id"]);
        $food->message=trans("admin.the data was fetched successfully");
        return $food;
    }
}
