<?php

namespace App\GraphQL\Queries\Admin\food;

use Illuminate\Support\Facades\Cache;

final class getfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $food=Cache::get("food:".$args["id"]);
        $food->message=trans("admin.the data was fetched successfully");
        return $food;



    }
}
