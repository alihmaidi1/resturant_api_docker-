<?php

namespace App\GraphQL\Queries\Admin\category;

use App\Models\category;
use Illuminate\Support\Facades\Cache;

final class getcategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $category=Cache::rememberForever("category:".$args["id"],function() use($args){

            return category::find($args["id"]);
        });

        $category->message=trans("admin.the data was fethed successfully");
        return $category;

    }
}
