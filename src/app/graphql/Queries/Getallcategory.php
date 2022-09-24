<?php

namespace App\GraphQL\Queries;

use App\Models\category;
use Illuminate\Support\Facades\Cache;

final class Getallcategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return Cache::rememberForever("categorys",function(){

            return category::all();
        });

    }
}
