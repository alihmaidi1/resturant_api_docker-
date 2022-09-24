<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Cache;

final class Getcategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $category=Cache::get("category_".$args["id"]);
        $category->message=trans("admin.the data was fethed successfully");
        return $category;

    }
}
