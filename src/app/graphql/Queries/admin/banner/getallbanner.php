<?php

namespace App\GraphQL\Queries\Admin\banner;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;

final class getallbanner
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
