<?php

namespace App\GraphQL\Queries\Admin\category;

use App\Models\category;
use Illuminate\Support\Facades\Cache;

final class getallcategory
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
