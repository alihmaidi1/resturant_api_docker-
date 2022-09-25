<?php

namespace App\GraphQL\Queries;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;

final class Getallbanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return Cache::rememberForever("banners",function(){

            return banner::all();


        });

    }
}
